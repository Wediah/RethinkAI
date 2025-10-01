@extends('components.layouts.main-nav')
@section('title', 'Events')

@section('content')
    <div>
        <div class="relative">
            <img src="{{ $event->image }}" class="h-80 w-full object-cover" alt="{{ $event->name }}"/>
        </div>

        <div class="px-4 md:px-16 py-10">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $event->name }}</h1>
            <p class="flex flex-row gap-1 items-center text-xl md:text-4xl font-light">
                <flux:icon.map-pin /> {{ $event->location }} | {{ ucfirst($event->status) }}
            </p>
            <p class="text-lg md:text-xl font-medium text-gray-800">
                {{ \Illuminate\Support\Carbon::parse($event->date)->translatedFormat('l, F j, Y') }} at {{ $event->time }}
            </p>
        </div>

        <div class="px-4 md:px-16 pb-10">
            <flux:heading size="xl">Register</flux:heading>
            <flux:text class="mt-2 text-lg">Fill out this form to register for this event.</flux:text>

            <!-- Success Notification with Auto-redirect -->
            @if(session('success'))
                <div id="success-notification" class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center justify-between max-w-3xl">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    <span class="text-sm">Redirecting in <span id="countdown">3</span>s...</span>
                </div>

                <script>
                    let countdown = 3;
                    const countdownElement = document.getElementById('countdown');
                    const redirectUrl = "{{ session('redirect_after', route('events.index')) }}";

                    const timer = setInterval(() => {
                        countdown--;
                        countdownElement.textContent = countdown;

                        if (countdown <= 0) {
                            clearInterval(timer);
                            window.location.href = redirectUrl;
                        }
                    }, 1000);
                </script>
            @endif

            @if(session('error'))
                <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center gap-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('events.register.store', $event) }}" method="POST" class="space-y-6 py-6 max-w-3xl">
                @csrf

                <flux:input
                    label="Full Name"
                    type="text"
                    name="name"
                    placeholder="Your Full Name"
                    value="{{ old('name') }}"
                    required
                />

                <flux:input
                    label="Email Address"
                    type="email"
                    name="email"
                    placeholder="kofi@example.com"
                    value="{{ old('email') }}"
                    required
                />

                <flux:input
                    label="Phone"
                    type="tel"
                    name="phone"
                    placeholder="Your Phone Number"
                    value="{{ old('phone') }}"
                    required
                />

                <div class="flex items-start gap-3">
                    <input
                        type="checkbox"
                        name="newsletter"
                        id="newsletter"
                        value="1"
                        {{ old('newsletter') ? 'checked' : '' }}
                        class="mt-1 w-4 h-4 text-blue-600 rounded focus:ring-blue-500 focus:ring-2"
                    >
                    <label for="newsletter" class="text-gray-700 cursor-pointer">
                        I agree to receive newsletter and upcoming events from RethinkAI
                    </label>
                </div>
                @error('newsletter')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <flux:button type="submit" class="mt-4">Register for Event</flux:button>
            </form>
        </div>
    </div>
@endsection
