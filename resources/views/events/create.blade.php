<x-layouts.app :title="__('New Event')">

    <div class="mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('events.index') }}">All Events</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>New Event</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>


    <div class="">
        <form action="{{ route('events.store') }}" method="POST" class=" max-w-lg space-y-6" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div>
                <flux:heading size="lg">create a new event</flux:heading>
                <flux:text class="mt-2">Welcome back!</flux:text>
            </div>
            <flux:input label="Event Banner/Image" type="file" name="image"/>
            <flux:input label="Name/Title" type="text" name="name" placeholder="Event Name"/>
            <flux:input label="Date" type="date" name="date" placeholder="Event Date"/>
            <flux:input label="Time" type="time" name="time" placeholder="Event Time"/>
            <flux:input label="Location" type="text" name="location" placeholder="Event Location"/>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium mb-2">Event Type</label>
                <select
                    name="status"
                    id="status"
                    required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Select Event Type</option>
                    <option value="online" {{ old('status') == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="in-person" {{ old('status', 'in-person') == 'in-person' ? 'selected' : '' }}>In-Person</option>
                </select>
                @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <flux:textarea label="Description" type="textarea" name="description" placeholder="Event Description"/>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Create Event</button>

        </form>
    </div>

</x-layouts.app>
