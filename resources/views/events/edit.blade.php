<x-layouts.app :title="__('Edit Event')">

    <div class="mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('events.index') }}">All Events</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Edit Event</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="">
        <form action="{{ route('events.update', $event) }}" method="POST" class="max-w-lg space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div>
                <flux:heading size="lg">Edit Event</flux:heading>
                <flux:text class="mt-2">Update the event details below.</flux:text>
            </div>

            <!-- Current Image Preview -->
            @if($event->image)
                <div class="mb-4">
                    <flux:label>Current Banner/Image</flux:label>
                    <div class="mt-2">
                        <img src="{{ $event->image }}"
                             alt="{{ $event->name }}"
                             class="h-32 w-full object-cover rounded-lg border"
                             onerror="this.style.display='none';">
                        <flux:text class="text-sm text-gray-500 mt-1">
                            Current image: {{ basename($event->image) }}
                        </flux:text>
                    </div>
                </div>
            @endif

            <flux:input
                label="Event Banner/Image"
                type="file"
                name="image"
                helper="Select a new image to replace the current one"
            />

            <flux:input
                label="Name/Title"
                type="text"
                name="name"
                placeholder="Event Name"
                value="{{ old('name', $event->name) }}"
            />

            <flux:input
                label="Date"
                type="date"
                name="date"
                placeholder="Event Date"
                value="{{ old('date', $event->date ? $event->date->format('Y-m-d') : '') }}"
            />

            <flux:input
                label="Time"
                type="time"
                name="time"
                placeholder="Event Time"
                value="{{ old('time', optional($event->time)->format('H:i')) }}"
            />

            <flux:input
                label="Location"
                type="text"
                name="location"
                placeholder="Event Location"
                value="{{ old('location', $event->location) }}"
            />

            <flux:input
                label="Description"
                type="textarea"
                name="description"
                placeholder="Event Description"
                value="{{ old('description', $event->description) }}"
            />

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition-colors">
                    Update Event
                </button>
                <a href="{{ route('events.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-colors">
                    Cancel
                </a>
            </div>

        </form>
    </div>

</x-layouts.app>
