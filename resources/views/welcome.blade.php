@extends('components.layouts.main-nav')

@section('title', 'Main')

@section('content')
    <div>
        <!-- Carousel Section -->
        <div class="relative carousel-container">
            <div class="carousel">
                <!-- Slide 1 -->
                <div class="carousel-slide">
                    <img src="{{ asset('assets/bac.png') }}" class="h-full w-full object-cover" alt="landing page image"/>
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="absolute md:top-96 top-36 left-0 text-white py-4 pl-4 md:pl-14 md:w-1/2 z-10" data-aos="fade-up">
                        <p class="text-2xl md:text-9xl font-bold block md:hidden">Rethink Africa <br> Intelligence</p>
                        <p class="text-2xl md:text-9xl font-bold hidden md:block">Rethink <br> Africa <br> Intelligence</p>
                    </div>
                </div>

                <!-- Slide 2 - Add more slides as needed -->
                <div class="carousel-slide">
                    <img src="{{ asset('assets/slide2.jpg') }}" class="h-full w-full object-cover" alt="second slide"/>
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="absolute md:top-96 top-36 left-0 text-white py-4 pl-4 md:pl-14 md:w-1/2 z-10" data-aos="fade-up">
                        <p class="text-2xl md:text-9xl font-bold block md:hidden">Innovation <br> for Africa</p>
                        <p class="text-2xl md:text-9xl font-bold hidden md:block">Innovation <br> for Africa</p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-slide">
                    <img src="{{ asset('assets/slide3.jpg') }}" class="h-full w-full object-cover" alt="third slide"/>
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="absolute md:top-96 top-36 left-0 text-white py-4 pl-4 md:pl-14 md:w-1/2 z-10" data-aos="fade-up">
                        <p class="text-2xl md:text-9xl font-bold block md:hidden">AI Revolution <br> in Africa</p>
                        <p class="text-2xl md:text-9xl font-bold hidden md:block">AI <br> Revolution <br> in Africa</p>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="carousel-slide">
                    <img src="{{ asset('assets/slide4.jpg') }}" class="h-full w-full object-cover" alt="fourth slide"/>
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="absolute md:top-96 top-36 left-0 text-white py-4 pl-4 md:pl-14 md:w-1/2 z-10" data-aos="fade-up">
                        <p class="text-2xl md:text-9xl font-bold block md:hidden">Digital Future <br> for Africa</p>
                        <p class="text-2xl md:text-9xl font-bold hidden md:block">Digital <br> Future <br> for Africa</p>
                    </div>
                </div>
            </div>

            <!-- Progress Indicator (No navigation buttons) -->
            <div class="carousel-progress">
                <div class="progress-item active" data-index="0">
                    <div class="progress-bar"></div>
                </div>
                <div class="progress-item" data-index="1">
                    <div class="progress-bar"></div>
                </div>
                <div class="progress-item" data-index="2">
                    <div class="progress-bar"></div>
                </div>
                <div class="progress-item" data-index="3">
                    <div class="progress-bar"></div>
                </div>
            </div>
        </div>

        <!-- Rest of your existing content remains exactly the same -->
        <div class="flex md:flex-row flex-col justify-center py-14 px-14 gap-7 items-center">
            <img src="{{ asset('assets/3P9A3043.jpg') }}" class="w-full h-full md:w-1/2 md:h-96 object-cover" alt="second image" data-aos="fade-right"/>
            <div class="w-full md:w-1/2 h-full md:h-96 flex flex-col justify-center" data-aos="fade-up" data-aos-delay="100">
                <p class="md:w-full text-2xl text-gray-400 flex-wrap">Rethink Africa Intelligence (RAI) is a visionary platform born from the strategic collaboration between Rethink Investment (Africa) and IoT Network Hub. It is designed to catapult Africa to the forefront of the global AI revolution by fostering an ecosystem of innovation, talent, and sustainable impact. </p>
                <a href="/about" class="pt-3.5 cursor-pointer">
                    <button class="p-3.5 border border-black flex items-center group">
                        Learn more
                        <i class='bx bx-right-arrow-alt transform transition-transform duration-200 group-hover:translate-x-2 text-lg ml-2'></i>
                    </button>
                </a>
            </div>
        </div>

        <!-- Rest of your existing content remains exactly the same -->
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
            <div class=" py-6">
                @php
                    $impact = App\Models\Impact::paginate(4);
                @endphp

                <div class="flex flex-row flex-wrap gap-6" data-aos="fade-up">
                    @foreach ($impact as $item)
                        <div class="w-1/2 md:w-1/3 lg:w-1/4">
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-full h-56 object-cover rounded-t-lg mb-4">
                                <div class="flex flex-row items-center gap-2 mb-4">
                                    <p class="text-gray-600 border border-gray-600 rounded-full px-4 py-1 text-sm">{{ $item->impact_type }}</p>
                                    <p class="text-gray-600 border border-gray-600 rounded-full px-4 py-1 text-sm">{{ $item->content_type }}</p>
                                </div>
                                <h2 class="text-xl font-semibold mb-4">{{ $item->name }} : {{ $item->description }}</h2>
                                <a href="{{ $item->content_type === 'article' ? route('impact.show', $item) : $item->external_link }}">
                                    <button class="bg-black text-white px-4 py-2 flex flex-row gap-1 rounded-md">view more
                                        <flux:icon.arrow-up-right variant="mini"/>
                                    </button>
                                </a>

                                <p class="text-gray-600 mt-4">{{ $item->created_at->format('F, j, Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Updated CSS for auto-advance carousel -->
    <style>
        .carousel-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .carousel {
            display: flex;
            transition: transform 0.8s ease-in-out;
            height: 100%;
        }

        .carousel-slide {
            position: relative;
            min-width: 100%;
            height: 100%;
        }

        /* Progress Indicator Styles */
        .carousel-progress {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 20;
        }

        .progress-item {
            width: 40px;
            height: 4px;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 2px;
            overflow: hidden;
            cursor: pointer;
        }

        .progress-bar {
            height: 100%;
            width: 0%;
            background: white;
            transition: width 5s linear;
        }

        .progress-item.active .progress-bar {
            width: 100%;
        }
    </style>

    <!-- Updated JavaScript for auto-advance carousel -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.carousel');
            const slides = document.querySelectorAll('.carousel-slide');
            const progressItems = document.querySelectorAll('.progress-item');
            const progressBars = document.querySelectorAll('.progress-bar');

            let currentSlide = 0;
            const totalSlides = slides.length;
            let autoSlideInterval;

            // Function to update carousel position
            function updateCarousel() {
                carousel.style.transform = `translateX(-${currentSlide * 100}%)`;

                // Update progress indicators
                progressItems.forEach((item, index) => {
                    if (index === currentSlide) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });

                // Reset and restart progress bars
                progressBars.forEach(bar => {
                    bar.style.transition = 'none';
                    bar.style.width = '0%';
                });

                setTimeout(() => {
                    progressBars[currentSlide].style.transition = 'width 5s linear';
                    progressBars[currentSlide].style.width = '100%';
                }, 50);
            }

            // Next slide function
            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateCarousel();
            }

            // Start auto-advance
            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000);
            }

            // Click on progress indicator to navigate
            progressItems.forEach(item => {
                item.addEventListener('click', function() {
                    const index = parseInt(this.getAttribute('data-index'));
                    currentSlide = index;
                    updateCarousel();

                    // Restart auto-advance
                    clearInterval(autoSlideInterval);
                    startAutoSlide();
                });
            });

            // Pause auto-advance on hover
            const carouselContainer = document.querySelector('.carousel-container');
            carouselContainer.addEventListener('mouseenter', () => {
                clearInterval(autoSlideInterval);
            });

            carouselContainer.addEventListener('mouseleave', () => {
                startAutoSlide();
            });

            // Initialize carousel
            updateCarousel();
            startAutoSlide();
        });
    </script>
@endsection
