<x-layouts.app :title="__('Edit Impact')">

    <div class="mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('impact.index') }}">All Impacts</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Edit Impact</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="max-w-3xl px-4 py-8">

        <div>
            <flux:heading size="lg">Edit Impact Story</flux:heading>
            <flux:text class="mt-2">Update your impact story details</flux:text>
        </div>

        <form action="{{ route('impact.update', $impact) }}" method="POST" enctype="multipart/form-data" class="space-y-6 mt-6">
            @csrf
            @method('PATCH')

            <!-- Content Type Selector -->
            <div>
                <label for="content_type" class="block text-gray-700 font-medium mb-2">Content Type *</label>
                <select
                    name="content_type"
                    id="content_type"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onchange="toggleContentFields()"
                >
                    <option value="">Select Content Type</option>
                    @foreach($contentTypes as $key => $label)
                        <option value="{{ $key }}" {{ old('content_type', $impact->content_type) == $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('content_type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Title *</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $impact->name) }}"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter impact story title"
                >
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description/Excerpt -->
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Short Description *</label>
                <textarea
                    name="description"
                    id="description"
                    rows="3"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Brief summary (max 500 characters)"
                    maxlength="500"
                >{{ old('description', $impact->description) }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Impact Category -->
            <div>
                <label for="impact_type" class="block text-gray-700 font-medium mb-2">Impact Category *</label>
                <select
                    name="impact_type"
                    id="impact_type"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Select Category</option>
                    @foreach($impactTypes as $key => $label)
                        <option value="{{ $key }}" {{ old('impact_type', $impact->impact_type) == $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('impact_type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Featured Image -->
            @if($impact->image)
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Current Featured Image</label>
                    <img
                        src="{{ $impact->image }}"
                        alt="{{ $impact->name }}"
                        class="w-64 h-40 object-cover rounded-lg border"
                    >
                </div>
            @endif

            <!-- Featured Image Upload -->
            <div>
                <label for="image" class="block text-gray-700 font-medium mb-2">
                    {{ $impact->image ? 'Change Featured Image (Optional)' : 'Featured Image *' }}
                </label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    accept="image/*"
                    {{ !$impact->image ? 'required' : '' }}
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onchange="previewImage(event)"
                >
                <p class="text-sm text-gray-500 mt-1">Recommended size: 1200x630px</p>
                <img id="image-preview" class="mt-4 max-w-md rounded-lg hidden" alt="Image preview">
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Article Content (Conditional) -->
            <div id="article-fields" class="hidden">
                <label for="content" class="block text-gray-700 font-medium mb-2">Article Content *</label>
                <textarea
                    name="content"
                    id="content"
                    rows="15"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono"
                    placeholder="Write your full article content here. You can use Markdown for formatting (e.g. paragraphs, headings, lists)..."
                >{{ old('content', $impact->content) }}</textarea>
                @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Video URL (Conditional) -->
            <div id="video-fields" class="hidden">
                <label for="video_url" class="block text-gray-700 font-medium mb-2">YouTube Video URL *</label>
                <input
                    type="url"
                    name="video_url"
                    id="video_url"
                    value="{{ old('video_url', $impact->video_url) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="https://www.youtube.com/watch?v=..."
                >
                <p class="text-sm text-gray-500 mt-1">Paste the full YouTube video URL</p>
                @error('video_url')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- External Link (Conditional) -->
            <div id="external-fields" class="hidden">
                <label for="external_link" class="block text-gray-700 font-medium mb-2">External Link *</label>
                <input
                    type="url"
                    name="external_link"
                    id="external_link"
                    value="{{ old('external_link', $impact->external_link) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="https://example.com/article"
                >
                @error('external_link')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date -->
            <div>
                <label for="date" class="block text-gray-700 font-medium mb-2">Publication Date</label>
                <input
                    type="date"
                    name="date"
                    id="date"
                    value="{{ old('date', $impact->date ? $impact->date->format('Y-m-d') : date('Y-m-d')) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Publish Status -->
            <div class="flex items-center gap-3">
                <input
                    type="checkbox"
                    name="is_published"
                    id="is_published"
                    value="1"
                    {{ old('is_published', $impact->is_published) ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500"
                >
                <label for="is_published" class="text-gray-700 cursor-pointer">Published</label>
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-4 pt-4">
                <button
                    type="submit"
                    class="text-white px-6 py-3 rounded-lg font-medium bg-blue-500 hover:bg-blue-600 transition-colors"
                >
                    Update Impact Story
                </button>

                href="{{ route('impact.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-medium transition-colors inline-block"
                >
                Cancel
                </a>
            </div>
        </form>
    </div>

    <script>
        function toggleContentFields() {
            const contentType = document.getElementById('content_type').value;

            // Hide all conditional fields
            document.getElementById('article-fields').classList.add('hidden');
            document.getElementById('video-fields').classList.add('hidden');
            document.getElementById('external-fields').classList.add('hidden');

            // Show relevant field
            if (contentType === 'article') {
                document.getElementById('article-fields').classList.remove('hidden');
                document.getElementById('content').required = true;
                document.getElementById('video_url').required = false;
                document.getElementById('external_link').required = false;
            } else if (contentType === 'video') {
                document.getElementById('video-fields').classList.remove('hidden');
                document.getElementById('content').required = false;
                document.getElementById('video_url').required = true;
                document.getElementById('external_link').required = false;
            } else if (contentType === 'external') {
                document.getElementById('external-fields').classList.remove('hidden');
                document.getElementById('content').required = false;
                document.getElementById('video_url').required = false;
                document.getElementById('external_link').required = true;
            }
        }

        function previewImage(event) {
            const preview = document.getElementById('image-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            toggleContentFields();
        });
    </script>
</x-layouts.app>
