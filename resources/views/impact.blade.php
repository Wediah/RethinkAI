@extends('components.layouts.main-nav')
@section('title', 'Main')

@section('content')
    <div>
        <div class="relative h-screen"> <!-- or h-[500px], h-full, etc. -->
            <img
                src="{{ asset('assets/0070.jpg') }}"
                class="absolute inset-0 h-full w-full object-cover"
                alt="landing page image"
            />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex flex-col justify-center py-20 px-16 text-white">
                <h1 class="text-4xl md:text-6xl font-bold" data-aos="fade-right">Impact</h1>
                <p class="mt-6 md:mt-8 text-lg md:text-2xl max-w-4xl" data-aos="fade-up" data-aos-delay="100">
                    At RethinkAI, we believe artificial intelligence isn’t just a global trend—it’s a transformative force for Africa. From Accra to Nairobi, Lagos to Kigali, we’re building AI solutions rooted in local context, designed to solve real challenges and unlock inclusive growth across the continent.

                    Our mission is to harness the power of AI to improve lives—whether by enhancing healthcare access in rural communities, optimizing agricultural yields for smallholder farmers, enabling smarter education tools for students, or supporting governments with data-driven policy decisions. But technology alone isn’t enough. That’s why ethics, equity, and African agency are at the heart of everything we build.

                    We collaborate with local developers, researchers, policymakers, and communities to co-create AI that reflects African values, languages, and aspirations. Through partnerships, capacity building, and open innovation, we’re helping to shape an AI ecosystem that is not only smart—but also fair, transparent, and truly African.
                </p>
            </div>
        </div>
        <div>

        </div>
    </div>
@endsection

