@extends('components.layouts.main-nav')
@section('title', 'Events')

@section('content')
    <div>
        <div class="relative">
            <img src="{{ $event->image }}" class="h-80 w-full object-cover" alt="landing page image"/>
        </div>

        <div class="px-4 md:px-14 space-y-6 my-6">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $event->name }}</h1>
            <p class="flex flex-row gap-1 items-center text-xl md:text-4xl font-light"><flux:icon.map-pin /> {{ $event->location }} | {{ $event->status }}</p>
            <p class="text-lg md:text-xl font-medium text-gray-800 ">{{ \Illuminate\Support\Carbon::parse($event->date)->translatedFormat('l, F j, Y') }}</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="text-lg md:text-2xl font-medium text-gray-800 ">{{ $event->description }}</p>
                </div>
                <div>
                    <a href="{{ route('event.register', $event) }}">
                        <button class="p-6 w-full text-center bg-black text-white text-lg md:text-3xl ">
                            RSVP for this event
                        </button>
                    </a>

                    <flux:separator text="or" class="my-12"/>

                    <div class="flex flex-col items-center">
                        <p class="text-lg md:text-2xl font-medium text-gray-800 my-6 text-center">Scan QR Code</p>
                        <img src="{{ $event->event_qrcode }}" class="h-96 w-96 object-fit mx-auto" alt="qrcode"/>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
