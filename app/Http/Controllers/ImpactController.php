<?php

namespace App\Http\Controllers;

use App\Models\Impact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImpactController extends Controller
{
    public function index()
    {
        $impacts = Impact::where('is_published', true)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('impact.index', compact('impacts'));
    }

    public function create()
    {
        $contentTypes = Impact::getContentTypes();
        $impactTypes = Impact::getImpactTypes();
        return view('impact.create', compact('contentTypes', 'impactTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required_if:content_type,article|nullable|string',
            'impact_type' => 'required|string|max:255',
            'content_type' => 'required|in:article,video,external',
            'video_url' => 'required_if:content_type,video|nullable|url',
            'external_link' => 'required_if:content_type,external|nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'date' => 'nullable|date',
            'is_published' => 'boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['name']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs('impact-images', $filename, ['disk' => 's3', 'visibility' => 'public']);
            $validated['image'] = env('AWS_URL') . '/' . $filePath;
        }

        Impact::create($validated);

        return redirect()->route('impact.index')
            ->with('success', 'Impact story created successfully!');
    }

    public function show($slug)
    {
        $impact = Impact::where('slug', $slug)->firstOrFail();
        $relatedImpacts = Impact::where('impact_type', $impact->impact_type)
            ->where('id', '!=', $impact->id)
            ->where('is_published', true)
            ->limit(3)
            ->get();

        return view('impact.show', compact('impact', 'relatedImpacts'));
    }

    public function edit(Impact $impact)
    {
        $contentTypes = Impact::getContentTypes();
        $impactTypes = Impact::getImpactTypes();
        return view('impact.edit', compact('impact', 'contentTypes', 'impactTypes'));
    }

    public function update(Request $request, Impact $impact)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required_if:content_type,article|nullable|string',
            'impact_type' => 'required|string|max:255',
            'content_type' => 'required|in:article,video,external',
            'video_url' => 'required_if:content_type,video|nullable|url',
            'external_link' => 'required_if:content_type,external|nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'date' => 'nullable|date',
            'is_published' => 'boolean',
        ]);

        // Update slug if name changed
        if ($impact->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($impact->image) {
                $oldFilePath = str_replace(env('AWS_URL') . '/', '', $impact->image);
                Storage::disk('s3')->delete($oldFilePath);
            }

            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs('impact-images', $filename, ['disk' => 's3', 'visibility' => 'public']);
            $validated['image'] = env('AWS_URL') . '/' . $filePath;
        }

        $impact->update($validated);

        return redirect()->route('impact.show', $impact->slug)
            ->with('success', 'Impact story updated successfully!');
    }

    public function destroy(Impact $impact)
    {
        // Delete image from S3
        if ($impact->image) {
            $filePath = str_replace(env('AWS_URL') . '/', '', $impact->image);
            Storage::disk('s3')->delete($filePath);
        }

        $impact->delete();

        return redirect()->route('impact.index')
            ->with('success', 'Impact story deleted successfully.');
    }
}
