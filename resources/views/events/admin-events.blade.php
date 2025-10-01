<x-layouts.app :title="__('All Event')">

    <div class="mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>New Event</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 bg-gray-200">
        @forelse($events as $event)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                @if($event->image)
                    <img
                        src="{{$event->image}}"
                        alt="{{ $event->name }}"
                        class="w-48 h-32 object-cover"
                    >
                @else
                    <div class="w-48 h-32 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif

                <div class="p-5">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $event->name }}</h3>
                    <div class="flex flex-row justify-between items-center">
                        <div class="flex items-center text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ $event->location }}</span>
                        </div>
                        <div class="flex flex-row items-center gap-2">
                            <a href="{{ route('events.edit', $event) }}"><flux:icon.pencil-square class="text-green-600"/></a>
                            <form action="{{ route('events.destroy', $event) }}"><flux:icon.trash class="text-red-600"/></form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500">No upcoming events at the moment.</p>
            </div>
        @endforelse
    </div>


</x-layouts.app>
