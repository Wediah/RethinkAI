<?php

namespace App\Http\Controllers;

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
            $filePath = $image->storeAs('event-banner', $filename, 's3');
            $validated['image'] = 'https://rethinkaibucket.s3.eu-north-1.amazonaws.com/' . $filePath;
        }


        Events::create($validated);

        if (auth()->check()) {
            return redirect()->route('dashboard')
                ->with('success', 'Event created successfully!');
        }
        return redirect()->route('events.index')
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
            // Delete old image from S3 (if exists)
            if ($event->image) {
                Storage::disk('s3')->delete($event->image);
            }

            $imagePath = $request->file('image')->store('events', 's3');
            // Storage::disk('s3')->setVisibility($imagePath, 'public'); // if needed
            $validated['image'] = $imagePath;
        }

        $event->update($validated);

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully!');
    }

    public function destroy(Events $event)
    {
        if ($event->image) {
            Storage::disk('s3')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully!');
    }
}
