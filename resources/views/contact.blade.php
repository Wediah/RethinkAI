@extends('components.layouts.main-nav')
@section('title', 'Main')

@section('content')
    <div>
        <div class="relative">
            <img src="{{ asset('assets/3P9A2780.jpg') }}" class="h-80 w-full object-cover" alt="landing page image"/>
            <div class="absolute inset-0 bg-black bg-opacity-40 h-80"></div>
            <div class="absolute inset-0 flex items-center justify-start pl-8">
                <span class="text-white md:text-6xl text-2xl font-bold text-left" data-aos="fade-right">Contact us</span>
            </div>
        </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 px-14 py-14 bg-gray-100" data-aos="fade-left">

                <!-- Left Column: Contact Info -->
                <div class="space-y-6 max-w-4xl">
                    <h2 class="md:text-6xl text-2xl font-bold">Get in touch - <br> With us. </h2>

                    <p class="text-lg md:text-xl font-medium text-black">
                        We are here to help.
                        Whether you have a question about our AI solutions, want to explore a partnership, or are curious about how ethical, African-led technology can drive impact in your community—we’d love to hear from you.
                        At RethinkAI, we believe collaboration is key to building a smarter, more inclusive digital future for Africa. Our team is ready to support you with insights, guidance, and tailored solutions that align with your goals.
                    </p>

                    <div class="space-y-4">
                        <div class="flex flex-col space-y-2">
                            <h1 class="font-semibold text-lg md:text-xl">Email</h1>
                            <span class="text-black">info@example.com</span>
                        </div>

                        <div class="flex flex-col space-x-2">
                            <h1 class="font-semibold text-lg md:text-xl">Phone</h1>
                            <span class="text-black">1800 123 4567</span>
                        </div>

                        <p class="text-black">Monday to Friday - 9:00 am to 7:00 pm</p>
                    </div>

                    <div class="mt-8">
                        <button class="bg-black text-white rounded-full py-2 px-4 flex flex-row items-center gap-2">
                            Live chat
                            <i class='bx bx-right-arrow-alt bg-white text-white rounded-full'></i>
                        </button>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="bg-white backdrop-blur-md rounded-xl p-12" data-aos="fade-up" data-aos-delay="100">
                    <form class="space-y-4">
                        @csrf
                        <div class="space-y-1">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                placeholder="Maxwell Say"
                                class="w-full px-4 py-3 bg-white/10 border border-gray-600 rounded-xl focus:ring-2 focus:ring-black focus:border-transparent text-black placeholder-gray-300"
                                name="name"
                                required
                            />
                        </div>
                        <div class="space-y-1">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                placeholder="max@globalmail.com"
                                class="w-full px-4 py-3 bg-white/10 border border-gray-600 rounded-xl focus:ring-2 focus:ring-black focus:border-transparent text-black placeholder-gray-300"
                                name="email"
                                required
                            />
                        </div>
                        <div class="space-y-1">
                            <label for="message">How can we help you</label>
                        <textarea
                            rows="5"
                            placeholder="Kindly reach out to us"
                            name="message"
                            class="w-full px-4 py-3 bg-white/10 border border-gray-600 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-white placeholder-gray-300 resize-none"
                            required
                        ></textarea>
                        </div>
                        <button
                            type="submit"
                            class="py-2 px-6 bg-black text-white font-medium rounded-full transition duration-300 transform hover:-translate-y-1 flex flex-row items-center gap-2"
                        >
                            Send message
                            <i class='bx bx-right-arrow-circle text-2xl' style='color:#f1f0f0'></i>
                        </button>
                    </form>
                </div>
            </div>
    </div>
@endsection
