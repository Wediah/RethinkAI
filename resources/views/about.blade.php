@extends('components.layouts.main-nav')
@section('title', 'Main')

@section('content')
    <div>
        <div class="relative">
            <img src="{{ asset('assets/3P9A2780.jpg') }}" class="h-80 w-full object-cover" alt="landing page image"/>
            <div class="absolute inset-0 bg-black bg-opacity-40 h-80"></div>
            <div class="absolute inset-0 flex items-center justify-start pl-8" data-aos="fade-right">
                <span class="text-white md:text-6xl text-2xl font-bold text-left">About us</span>
            </div>
        </div>
        <div>
            <section class="relative bg-black text-white py-20 px-6">
                <div class="container mx-auto flex flex-col md:flex-row items-center gap-12">
                    <div class="md:w-1/2 space-y-6" data-aos="fade-up">
                        <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                            We’re driven by the unending urge to know more.
                        </h1>
                        <p class="text-lg opacity-90">
                            As an organization making giant efforts in making Artificial Intelligence accessible in Africa, we maintain a portfolio of research-driven projects in every aspect of life from product innovation to infrastructure goals while producing individuals and teams with the power to reach their potentials.
                        </p>
                    </div>
                    <div class="md:w-1/2 flex justify-center" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset('assets/0207.jpg') }}" alt="African AI Innovation Map" class="rounded-lg shadow-xl max-w-full h-auto" />
                    </div>
                </div>
            </section>

            <!-- Research Environment -->
            <section class="py-20 px-6 bg-gray-50">
                <div class="container mx-auto flex flex-col md:flex-row gap-12 items-start" data-aos="fade-up">
                    <div class="md:w-1/3">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">An exciting research environment</h2>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-700 leading-relaxed">
                            At RethinkAI, we are pioneering AI accessibility in Africa by creating innovative AI-powered events and products designed to bridge the technological divide. Our dynamic working environment thrives on collaboration, creativity, and a shared mission to democratize AI for African entrepreneurs, developers, and businesses. We foster a culture of continuous learning, where team members are encouraged to experiment with cutting-edge AI tools, contribute ideas, and engage in impactful projects that drive digital transformation across the continent. With a hybrid work model that balances flexibility and teamwork, we prioritize inclusivity, offering mentorship programs and skill-building workshops to ensure every employee grows alongside the company. By blending local insights with global AI advancements, we cultivate a workspace where passion meets purpose—empowering Africa’s future through AI, one solution at a time.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Core Domains -->
            <section class="py-20 px-6" >
                <div class="container mx-auto">
                    <div class="flex flex-col md:flex-row gap-12 items-start" data-aos="fade-up">
                        <div class="md:w-1/3">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Our works cuts across two main Domains</h2>
                        </div>
                        <div class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Events -->
                            <div class="border p-6 rounded-lg bg-white shadow-sm">
                                <img src="{{ asset('assets/9994.jpg') }}" alt="AI Workshop" class="w-full h-48 object-cover rounded-md mb-4" />
                                <h3 class="text-xl font-semibold mb-3">Curated AI Events</h3>
                                <p class="text-gray-700">
                                    We organize immersive conferences, hackathons, and workshops designed to educate, inspire, and connect Africa’s tech community. Our events feature:
                                </p>
                                <ul class="list-disc list-inside mt-2 text-gray-700">
                                    <li>Practical Learning: Hands-on sessions on AI tools relevant to African industries (agriculture, healthcare, finance).</li>
                                    <li>Local Experts & Global Insights: Panels with African AI pioneers and international collaborators.</li>
                                    <li>Startup Showcases: Platforms for homegrown innovators to pitch AI solutions to investors.</li>
                                </ul>
                            </div>

                            <!-- Products -->
                            <div class="border p-6 rounded-lg bg-white shadow-sm">
                                <img src="{{ asset('assets/9862.jpg') }}" alt="AI Developer" class="w-full h-48 object-cover rounded-md mb-4" />
                                <h3 class="text-xl font-semibold mb-3">Locally Tailored AI Products</h3>
                                <p class="text-gray-700">
                                    Our product development is guided by on-the-ground research to ensure cultural, linguistic, and infrastructural relevance:
                                </p>
                                <ul class="list-disc list-inside mt-2 text-gray-700">
                                    <li><strong>Language-Inclusive Tools:</strong> AI solutions supporting local languages (Swahili, Hausa, Amharic) for education and commerce.</li>
                                    <li><strong>Offline-Capable AI:</strong> Lightweight applications optimized for low-bandwidth areas.</li>
                                    <li><strong>Sector-Specific Innovations:</strong> Agri-tech AI for smallholder farmers, diagnostic tools for understaffed clinics, and fintech chatbots for informal economies.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- How We Work -->
            <section class="py-20 px-6 bg-gray-50">
                <div class="container mx-auto flex flex-col md:flex-row gap-12 items-start" data-aos="fade-up">
                    <div class="md:w-1/3">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">How we do our best work</h2>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-700 leading-relaxed">
                            At RethinkAI, we cultivate a dynamic, collaborative work culture where teamwork and knowledge-sharing fuel our mission to make AI accessible across Africa. Our cross-functional teams spanning engineers, researchers, and event designers work closely through weekly "AI Jam Sessions" and "Fail Forward Fridays," creating a space where ideas are openly exchanged, experiments are celebrated, and setbacks become learning opportunities. We empower every team member to contribute through decentralized squads that own projects end-to-end and quarterly Innovation Sprints where any employee can pitch solutions tailored to African needs, like our Hausa-speaking chatbot or agri-tech tools for smallholder farmers. By documenting insights in shared wikis, recognizing peer contributions through "Shine Awards," and hosting monthly Impact Showcases, we ensure collaboration isn't just encouraged it's the backbone of how we build inclusive, research-driven AI products and events that truly serve Africa’s communities. Together, we don’t just innovate; we elevate each other and the continent we’re proud to call home.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

