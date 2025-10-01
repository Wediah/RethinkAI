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
        $impacts = Impact::orderBy('created_at', 'desc')->paginate(10);
        return view('impact.index', ['impacts' => $impacts]);
    }

    public function create()
    {
        return view('impact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'impact_type' => 'required|string|max:255',
            'external_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'date' => 'nullable|date',
        ]);

        // Generate slug from name
        $validated['slug'] = Str::slug($validated['name']);

        // Handle image upload to S3
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('impact-images', 's3');
            $validated['image'] = $imagePath;
        }

        Impact::create($validated);

        return redirect()->route('impact.index')
            ->with('success', 'Impact created successfully.');
    }

    public function show(Impact $impact)
    {
        return view('impact.show', compact('impact'));
    }

    public function edit(Impact $impact)
    {
        return view('impact.edit', compact('impact'));
    }

    public function update(Request $request, Impact $impact)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'impact_type' => 'required|string|max:255',
            'external_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'date' => 'nullable|date',
        ]);

        // Update slug if name changed
        if ($impact->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle image upload to S3
        if ($request->hasFile('image')) {
            // Delete old image from S3 if exists
            if ($impact->image) {
                Storage::disk('s3')->delete($impact->image);
            }

            $imagePath = $request->file('image')->store('impact-images', 's3');
            $validated['image'] = $imagePath;
        }

        $impact->update($validated);

        return redirect()->route('impact.index')
            ->with('success', 'Impact updated successfully.');
    }

    public function destroy(Impact $impact)
    {
        // Delete image from S3 if exists
        if ($impact->image) {
            Storage::disk('s3')->delete($impact->image);
        }

        $impact->delete();

        return redirect()->route('impact.index')
            ->with('success', 'Impact deleted successfully.');
    }

    /**
     * Get S3 URL for image with fallback
     */
    private function getImageUrl($imagePath)
    {
        if (!$imagePath) {
            return null;
        }

        try {
            return Storage::disk('s3')->url($imagePath);
        } catch (\Exception $e) {
            // Fallback if S3 URL generation fails
            return null;
        }
    }
}
