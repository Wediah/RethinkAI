<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Impact</h1>

    <form action="{{ route('impact.update', $impact) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
            <input type="text" name="name" id="name" value="{{ old('name', $impact->name) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                      required>{{ old('description', $impact->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="impact_type" class="block text-sm font-medium text-gray-700 mb-2">Impact Type *</label>
            <input type="text" name="impact_type" id="impact_type" value="{{ old('impact_type', $impact->impact_type) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            @error('impact_type')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
            <input type="date" name="date" id="date" value="{{ old('date', $impact->date ? $impact->date->format('Y-m-d') : '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('date')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="external_link" class="block text-sm font-medium text-gray-700 mb-2">External Link</label>
            <input type="url" name="external_link" id="external_link" value="{{ old('external_link', $impact->external_link) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="https://example.com">
            @error('external_link')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>

            @if($impact->image)
                <div class="mb-2">
                    <img src="{{ Storage::disk('s3')->url($impact->image) }}"
                         alt="{{ $impact->name }}"
                         class="h-32 w-32 object-cover rounded"
                         onerror="this.style.display='none';">
                </div>
                <div class="text-sm text-gray-500 mb-2">
                    Current image: {{ basename($impact->image) }}
                </div>
            @endif

            <input type="file" name="image" id="image"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   accept="image/*">
            @error('image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('impact.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Update Impact
            </button>
        </div>
    </form>
</div>

<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Impact</h1>

    <form action="{{ route('impact.update', $impact) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
            <input type="text" name="name" id="name" value="{{ old('name', $impact->name) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                      required>{{ old('description', $impact->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="impact_type" class="block text-sm font-medium text-gray-700 mb-2">Impact Type *</label>
            <input type="text" name="impact_type" id="impact_type" value="{{ old('impact_type', $impact->impact_type) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            @error('impact_type')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
            <input type="date" name="date" id="date" value="{{ old('date', $impact->date ? $impact->date->format('Y-m-d') : '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('date')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="external_link" class="block text-sm font-medium text-gray-700 mb-2">External Link</label>
            <input type="url" name="external_link" id="external_link" value="{{ old('external_link', $impact->external_link) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="https://example.com">
            @error('external_link')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>

            @if($impact->image)
                <div class="mb-2">
                    <img src="{{ Storage::disk('s3')->url($impact->image) }}"
                         alt="{{ $impact->name }}"
                         class="h-32 w-32 object-cover rounded"
                         onerror="this.style.display='none';">
                </div>
                <div class="text-sm text-gray-500 mb-2">
                    Current image: {{ basename($impact->image) }}
                </div>
            @endif

            <input type="file" name="image" id="image"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   accept="image/*">
            @error('image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('impact.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Update Impact
            </button>
        </div>
    </form>
</div>
