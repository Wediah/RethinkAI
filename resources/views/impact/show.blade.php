@extends('components.layouts.main-nav')
@section('title', 'Impact')

@section('content')
    <div>
        <div class="relative">
            <img src="{{ $impact->image }}" class="h-2/4 w-full object-cover" alt="landing page image"/>
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="absolute left-0 bottom-0 w-full flex flex-col items-start justify-end text-white px-4 md:px-14 space-y-6 pb-8">
                <p class="flex flex-row gap-1 items-center text-md md:text-lg font-light">{{ $impact->impact_type }} / {{ $impact->content_type }}</p>
                <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $impact->name }} : {{$impact->description}}</h1>
                <p class="text-lg md:text-xl font-medium text-white ">{{ \Illuminate\Support\Carbon::parse($impact->date)->translatedFormat('l, F j, Y') }}</p>
            </div>
        </div>

        <div class="px-4 md:px-14 space-y-6 my-6">


            <p class="text-lg md:text-xl text-gray-600">{{ $impact->content }}</p>
        </div>

    </div>
@endsection
