@extends('components.layouts.main-nav')
@section('title', 'Events')

@section('content')
    <div>
        <div class="relative h-[80vh] w-full overflow-hidden">
            <img
                src="{{ asset('assets/9849.jpg') }}"
                class="absolute inset-0 h-full w-full object-cover"
                alt="landing page image"
            />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex flex-col justify-center py-12 px-4 md:px-16 text-white">
                <h1 class="text-4xl md:text-6xl font-bold" data-aos="fade-right">Events</h1>
                <p class="mt-6 md:mt-8 text-lg md:text-2xl max-w-4xl" data-aos="fade-up" data-aos-delay="100">
                    Explore upcoming AI and innovation events across Africa—workshops, summits, and community gatherings designed to inspire, educate, and drive impact. Whether you're a developer, policymaker, entrepreneur, or changemaker, there’s a seat for you.
                    <br><br>
                    Stay informed. Get involved. Shape the future—together.
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 py-20 px-16">
            @forelse($events as $event)
                <div class="">
                    @if($event->image)
                        <img
                            src="{{ $event->image }}"
                            alt="{{ $event->name }}"
                            class="w-full h-96 object-cover"
                        >
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif

                    <div class="py-2 flex justify-between items-center flex-row">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $event->name }}</h3>
                            <div class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $event->location }}</span>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('events.show', $event) }}" class="hover:underline underline-offset-1 flex flex-row gap-1 transition duration-300">
                                View More <flux:icon.arrow-up-right variant="mini"/>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-500">No upcoming events at the moment.</p>
                </div>
            @endforelse
        </div>
        <div>

        </div>
    </div>
@endsection

