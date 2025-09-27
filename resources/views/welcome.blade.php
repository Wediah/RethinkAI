@extends('components.layouts.main-nav')

@section('title', 'Main')

@section('content')
    <div>
        <div class="relative">
            <img src="{{ asset('assets/bac.png') }}" class="h-10/12 w-full object-cover" alt="landing page image"/>
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute md:top-96 top-80 left-0 text-white py-4 pl-4 md:pl-14 md:w-1/2 z-10" data-aos="fade-up">
                <p class="text-9xl font-bold">Rethink <br> Africa <br> Intelligence</p>
            </div>
        </div>
        <div class="flex md:flex-row flex-col justify-center py-14 px-14 gap-7 items-center">
            <img src="{{ asset('assets/3P9A3043.jpg') }}" class="w-full h-full md:w-1/2 md:h-96 object-cover" alt="second image" data-aos="fade-right"/>
            <div class="w-full md:w-1/2 h-full md:h-96 flex flex-col justify-center" data-aos="fade-up" data-aos-delay="100">
                <p class="md:w-3/4 text-2xl text-gray-400">Rethink Africa Intelligence (RAI) is a visionary platform born from the strategic collaboration between IoT Network Hub and Rethink Investment (Africa). It is designed to catapult Africa to the forefront of the global AI revolution by fostering an ecosystem of innovation, talent, and sustainable impact. </p>
                <a href="/about" class="pt-3.5 cursor-pointer">
                    <button class="p-3.5 border border-black flex items-center group">
                        Learn more
                        <i class='bx bx-right-arrow-alt transform transition-transform duration-200 group-hover:translate-x-2 text-lg ml-2'></i>
                    </button>
                </a>
            </div>
        </div>
        <div class="py-14 px-14">
            <h1 class=" text-2xl md:text-6xl font-bold">Artificial Intelligence acceleration for the <br> transformation of industries, economies, and societies</h1>
            <div class="flex flex-col md:flex-row gap-7 pt-14">


                    <!-- AI Talent Revolution -->
                    <div class="flex flex-col space-y-3" data-aos="fade-up">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500 mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z" />
                            </svg>
                            <h3 class="text-lg font-semibold text-yellow-600">AI Talent Revolution</h3>
                        </div>
                        <p class="text-gray-700 leading-relaxed text-sm">
                            <strong>Scale Training:</strong> Aim to train millions of future AI professionals by 2050.<br>
                            <strong>Digital Literacy:</strong> Equip youth across Africa with foundational and advanced AI skills.<br>
                            <strong>Inclusivity:</strong> Prioritize programs for women and underrepresented groups in tech.
                        </p>
                    </div>

                    <!-- AI Innovation Ecosystem -->
                    <div class="flex flex-col space-y-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500 mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <h3 class="text-lg font-semibold text-yellow-600">AI Innovation Ecosystem</h3>
                        </div>
                        <p class="text-gray-700 leading-relaxed text-sm">
                            <strong>Innovation Hubs:</strong> Host annual summits and innovation expos that spotlight African breakthroughs.<br>
                            <strong>Startup Incubation:</strong> Create pathways for AI startups to scale and commercialize their ideas.<br>
                            <strong>Investment:</strong> Launch dedicated funds to support indigenous AI research and entrepreneurship.
                        </p>
                    </div>

                    <!-- Policy & Advocacy -->
                    <div class="flex flex-col space-y-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500 mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h1" />
                            </svg>
                            <h3 class="text-lg font-semibold text-yellow-600">Policy & Advocacy</h3>
                        </div>
                        <p class="text-gray-700 leading-relaxed text-sm">
                            <strong>Ethical Frameworks:</strong> Collaborate with governments to develop policies for responsible AI.<br>
                            <strong>Public-Private Partnerships:</strong> Leverage multi-stakeholder collaboration to drive the AI agenda.<br>
                            <strong>Data Sovereignty:</strong> Advocate for policies that ensure African data remains under local control.
                        </p>
                    </div>


            </div>
        </div>
        <div class="py-14 px-14">
            <h1 class=" text-2xl md:text-6xl font-bold">Impact</h1>
            <div class="flex md:flex-row flex-col gap-3.5">

            </div>
        </div>
    </div>

@endsection
