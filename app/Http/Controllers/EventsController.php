<?php

namespace App\Http\Controllers;

use App\Models\EventAttendees;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::orderBy('date', 'desc')->paginate(10);
        return view('events.index', ['events' => $events]);
    }

    public function allEventAttendees(Events $event, Request $request)
    {
        $attendees = EventAttendees::where('event_id', $event->id)
            ->orderBy('created_at', 'desc')->paginate(10);
        return view('events.all-attendees', ['attendees' => $attendees, 'event' => $event]);
    }

    public function adminIndex()
    {
        $events = Events::orderBy('date', 'desc')->paginate(10);
        return view('events.admin-events', ['events' => $events]);
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('events.create');
    }

    public function show(Events $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(Events $event)
    {
        return view('events.edit', compact('event'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'date'        => 'required|date|after_or_equal:today',
            'time'        => 'required|date_format:H:i',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            // Store the file in S3 with public visibility
            $filePath = $image->storeAs('event-banner', $filename, ['disk' => 's3', 'visibility' => 'public']);

            // Store the full URL in the database
            $validated['image'] = env('AWS_URL') . '/' . $filePath;
        }

        $newEvent = Events::create($validated);

        $registerUrl = route('event.register', $newEvent->slug);
        $qrCode = \QrCode::format('png')->size(300)->generate($registerUrl);

        // Store QR code in S3
        $qrFilename = 'qrcode_' . $newEvent->slug . '.png';
        Storage::disk('s3')->put('event-qrcodes/' . $qrFilename, $qrCode, 'public');

        // Save QR code URL to event_qrcode column
        $newEvent->event_qrcode = env('AWS_URL') . '/event-qrcodes/' . $qrFilename;
        $newEvent->save();

        return redirect()->route('admin.events')
            ->with('success', 'Event created successfully!');
    }

    public function update(Request $request, Events $event)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'date'        => 'required|date|after_or_equal:today',
            'time'        => 'required|date_format:H:i',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($event->image) {
                // Extract the file path from the full URL
                $oldFilePath = str_replace(env('AWS_URL') . '/', '', $event->image);
                Storage::disk('s3')->delete($oldFilePath);
            }

            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            // Store the new file in S3 with public visibility
            $filePath = $image->storeAs('event-banner', $filename, ['disk' => 's3', 'visibility' => 'public']);

            // Store the full URL in the database
            $validated['image'] = env('AWS_URL') . '/' . $filePath;
        }

        $event->update($validated);

        return redirect()->route('admin.events')
            ->with('success', 'Event updated successfully!');
    }

    public function register(Events $event) {
        return view('events.register', compact('event'));
    }

    public function registerStore(Request $request, Events $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'newsletter' => 'nullable|boolean'
        ]);

        // Check if user already registered
        $existingRegistration = EventAttendees::where('event_id', $event->id)
            ->where('email', $validated['email'])
            ->first();

        if ($existingRegistration) {
            return redirect()->back()
                ->with('error', 'You have already registered for this event!')
                ->withInput();
        }

        EventAttendees::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'newsletter' => $request->has('newsletter') ? true : false,
        ]);

        return redirect()->back()
            ->with('success', 'Successfully registered for ' . $event->name . '!')
            ->with('redirect_after', route('events.index'));
    }

    public function destroy(Events $event)
    {
        if ($event->image) {
            // Extract the file path from the full URL
            $filePath = str_replace(env('AWS_URL') . '/', '', $event->image);
            Storage::disk('s3')->delete($filePath);
        }

        $event->delete();

        return redirect()->route('admin.events')
            ->with('success', 'Event deleted successfully!');
    }
}
