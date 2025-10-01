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
            <flux:input label="Description" type="textarea" name="description" placeholder="Event Description"/>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Create Event</button>

        </form>
    </div>

</x-layouts.app>
