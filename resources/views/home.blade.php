@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-dwello-beige">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side - Text Content -->
            <div class="space-y-8">
                <h1 class="text-5xl lg:text-6xl font-bold text-dwello-brown leading-tight">
                    Find Your<br>
                    Dream Home
                </h1>
                <p class="text-lg text-dwello-brown leading-relaxed font-bold">
                    Explore our curated selection of exquisite properties meticulously tailored to your unique dream home vision.
                </p>
                @auth
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" 
                       class="inline-block bg-dwello-brown text-white px-8 py-3 rounded-lg text-lg font-medium hover:bg-opacity-90 transition duration-300 shadow-lg">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" 
                       class="inline-block bg-dwello-brown text-white px-8 py-3 rounded-lg text-lg font-bold hover:bg-opacity-90 transition duration-300 shadow-lg">
                        Sign up
                    </a>
                @endauth
            </div>

            <!-- Right Side - House Image -->
            <div class="relative">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('img1.png') }}" 
                         alt="Modern luxury house" 
                         class="w-full h-96 lg:h-[500px] object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search Bar Section -->
<section class="py-8 -mt-8 relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-dwello-light-beige rounded-2xl p-4 shadow-lg">
            <form action="{{ route('search') }}" method="GET" class="flex flex-col lg:flex-row gap-3 items-center">
                @csrf
                <!-- Location Input -->
                <div class="relative flex-1 w-full">
                    <input type="text" 
                           name="location"
                           placeholder="Location" 
                           value="{{ request('location') }}"
                           class="w-full px-4 py-3 bg-white rounded-lg border-0 focus:ring-2 focus:ring-dwello-brown focus:outline-none text-dwello-brown placeholder-gray-500 text-sm">
                    <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-dwello-brown" 
                         fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    </svg>
                </div>

                <!-- Type Input -->
                <div class="relative flex-1 w-full">
                    <select name="type" 
                            class="w-full px-4 py-3 bg-white rounded-lg border-0 focus:ring-2 focus:ring-dwello-brown focus:outline-none text-dwello-brown text-sm appearance-none cursor-pointer">
                        <option value="">Type</option>
                        <option value="house" {{ request('type') == 'house' ? 'selected' : '' }}>House</option>
                        <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                        <option value="condo" {{ request('type') == 'condo' ? 'selected' : '' }}>Condo</option>
                        <option value="cabin" {{ request('type') == 'cabin' ? 'selected' : '' }}>Cabin</option>
                    </select>
                    <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-dwello-brown pointer-events-none" 
                         fill="currentColor" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                </div>

                <!-- Price Range Input -->
                <div class="relative flex-1 w-full">
                    <select name="price_range" 
                            class="w-full px-4 py-3 bg-white rounded-lg border-0 focus:ring-2 focus:ring-dwello-brown focus:outline-none text-dwello-brown text-sm appearance-none cursor-pointer">
                        <option value="">Price Range</option>
                        <option value="0-500000" {{ request('price_range') == '0-500000' ? 'selected' : '' }}>Under $500K</option>
                        <option value="500000-1000000" {{ request('price_range') == '500000-1000000' ? 'selected' : '' }}>$500K - $1M</option>
                        <option value="1000000-2000000" {{ request('price_range') == '1000000-2000000' ? 'selected' : '' }}>$1M - $2M</option>
                        <option value="2000000-5000000" {{ request('price_range') == '2000000-5000000' ? 'selected' : '' }}>$2M - $5M</option>
                        <option value="5000000-999999999" {{ request('price_range') == '5000000-999999999' ? 'selected' : '' }}>Above $5M</option>
                    </select>
                    <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-dwello-brown pointer-events-none" 
                         fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
                    </svg>
                </div>

                <!-- Vertical Separator -->
                <div class="hidden lg:block w-px h-8 bg-gray-300 mx-2"></div>

                <!-- Sign Up Button -->
                <div class="flex-shrink-0 w-full lg:w-auto">
                    <a href="{{ route('register') }}" 
                       class="bg-dwello-brown text-white px-6 py-3 rounded-lg text-center font-bold hover:bg-opacity-90 transition duration-300 whitespace-nowrap text-sm block w-full lg:w-auto">
                        Sign up
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- We Help You Find Your Dream Home Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side - House Image -->
            <div class="relative order-1 lg:order-1">
                <div class="relative rounded-2xl overflow-hidden">
                    <img src="{{ asset('img2.png') }}" 
                         alt="Modern luxury house" 
                         class="w-full h-96 lg:h-[500px] object-cover">
                </div>
            </div>

            <!-- Right Side - Text Content -->
            <div class="space-y-8 order-2 lg:order-2">
                <h2 class="text-4xl lg:text-5xl font-bold text-dwello-brown leading-tight">
                    We Help You To Find<br>
                    Your Dream Home
                </h2>
                <p class="text-lg text-dwello-brown leading-relaxed font-normal">
                    From cozy cottages to luxurious estates, our dedicated team guides you through every step of the journey, ensuring your dream home becomes a reality.
                </p>
                
                <!-- Statistics -->
                <div class="grid grid-cols-3 gap-8 pt-8">
                    <div class="text-center">
                        <div class="text-4xl lg:text-5xl font-bold text-dwello-brown mb-2">8K+</div>
                        <div class="text-dwello-brown font-medium">Houses Available</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl lg:text-5xl font-bold text-dwello-brown mb-2">6K+</div>
                        <div class="text-dwello-brown font-medium">Houses Sold</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl lg:text-5xl font-bold text-dwello-brown mb-2">2K+</div>
                        <div class="text-dwello-brown font-medium">Trusted Agents</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-20 bg-dwello-beige">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl lg:text-5xl font-bold text-dwello-brown mb-6">
            Why Choose Us
        </h2>
        <p class="text-xl text-dwello-brown max-w-4xl mx-auto leading-relaxed font-bold">
            Elevating Your Home Buying Experience with Expertise, Integrity, and Unmatched Personalized Service
        </p>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-dwello-beige">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature Card 1 -->
            <div class="bg-dwello-light-beige rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-dwello-tan rounded-2xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-dwello-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dwello-brown mb-4 text-center">Expert Guidance</h3>
                <p class="text-dwello-brown leading-relaxed text-center">
                    Benefit from our team's seasoned expertise for a smooth buying experience
                </p>
            </div>

            <!-- Feature Card 2 -->
            <div class="bg-dwello-light-beige rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-dwello-tan rounded-2xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-dwello-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        <path d="M8 12h4l3-3"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dwello-brown mb-4 text-center">Personalized Service</h3>
                <p class="text-dwello-brown leading-relaxed text-center">
                    Our services adapt to your unique needs, making your journey stress-free
                </p>
            </div>

            <!-- Feature Card 3 -->
            <div class="bg-dwello-light-beige rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-dwello-tan rounded-2xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-dwello-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        <path d="M9 5h6v2H9V5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dwello-brown mb-4 text-center">Transparent Process</h3>
                <p class="text-dwello-brown leading-relaxed text-center">
                    Stay informed with our clear and honest approach to buying your home
                </p>
            </div>

            <!-- Feature Card 4 -->
            <div class="bg-dwello-light-beige rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-dwello-tan rounded-2xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-dwello-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        <path d="M17 8l-4 4-4-4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dwello-brown mb-4 text-center">Exceptional Support</h3>
                <p class="text-dwello-brown leading-relaxed text-center">
                    Providing peace of mind with our responsive and attentive customer service
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Popular Residences Section -->
<section id="popular-residences" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl lg:text-5xl font-bold text-dwello-brown text-center mb-16">
            Our Popular Residences
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredProperties as $index => $property)
                <!-- Property Card {{ $index + 1 }} -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <!-- Image -->
                    <div class="relative h-64">
                        <img src="{{ asset($property->image) }}" 
                             alt="{{ $property->title }}" 
                             class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Entire bottom section with tan background -->
                    <div class="px-6 py-6 bg-dwello-tan">
                        <!-- Location -->
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-dwello-brown mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="font-bold text-dwello-brown">{{ $property->city }}, {{ $property->state }}</span>
                        </div>

                        <!-- Rooms and Area -->
                        <div class="flex items-center mb-6">
                            <!-- Rooms -->
                            <div class="flex items-center mr-8">
                                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-dwello-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                        <path d="M8 21v-4a2 2 0 012-2h4a2 2 0 012 2v4"/>
                                    </svg>
                                </div>
                                <span class="text-dwello-brown font-medium">{{ $property->bedrooms }} Rooms</span>
                            </div>

                            <!-- Area -->
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-dwello-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path d="M3 3v18h18V3H3z"/>
                                        <path d="M9 9h6v6H9z"/>
                                        <path d="M12 3v18"/>
                                        <path d="M3 12h18"/>
                                    </svg>
                                </div>
                                <span class="text-dwello-brown font-medium">{{ number_format($property->area) }} sq ft</span>
                            </div>
                        </div>

                        <!-- Price and Button -->
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-bold text-dwello-brown">
                                ${{ number_format($property->price) }}
                            </div>
                            @auth
                                <a href="{{ route('properties.show', $property->id) }}" 
                                   class="bg-dwello-brown text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-opacity-90 transition duration-300">
                                    View Details
                                </a>
                            @else
                                <a href="{{ route('register') }}" 
                                   class="bg-dwello-brown text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-opacity-90 transition duration-300">
                                    Sign up
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-dwello-beige">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl lg:text-5xl font-bold text-dwello-brown text-center mb-16">
            What People Say<br>
            <span class="text-dwello-brown">About Dwello</span>
        </h2>
        
        <!-- Testimonials Carousel -->
        <div class="relative">
            <div id="testimonialsCarousel" class="overflow-hidden">
                <div id="testimonialsContainer" class="flex transition-transform duration-500 ease-in-out">
                    <!-- Testimonial 1 -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl overflow-hidden card-shadow h-full flex flex-col">
                            <div class="relative">
                                <img src="{{ asset('im4.png') }}" 
                                     alt="Luxury bedroom" 
                                     class="w-full h-48 object-cover rounded-t-2xl">
                            </div>
                            <div class="p-6 bg-dwello-tan flex-1 flex flex-col">
                                <div class="flex items-center mb-4">
                                    <img src="{{ asset('person1.jpeg') }}" 
                                         alt="Sarah Nguyen" 
                                         class="w-12 h-12 rounded-full mr-4">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-dwello-brown">Sarah Nguyen</h4>
                                        <p class="text-sm text-dwello-brown">San Francisco</p>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-yellow-500 text-lg">★</span>
                                        <span class="text-dwello-brown font-bold ml-1">5.0</span>
                                    </div>
                                </div>
                                <p class="text-dwello-brown leading-relaxed flex-1">
                                    "Dwello truly cares about their clients. They listened to my needs and preferences and helped me find the perfect home in the Bay Area. Their professionalism and attention to detail are unmatched."
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl overflow-hidden card-shadow h-full flex flex-col">
                            <div class="relative">
                                <img src="{{ asset('im5.png') }}" 
                                     alt="Modern living space" 
                                     class="w-full h-48 object-cover rounded-t-2xl">
                            </div>
                            <div class="p-6 bg-dwello-tan flex-1 flex flex-col">
                                <div class="flex items-center mb-4">
                                    <img src="{{ asset('person2.jpg') }}" 
                                         alt="Michael Rodriguez" 
                                         class="w-12 h-12 rounded-full mr-4">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-dwello-brown">Michael Rodriguez</h4>
                                        <p class="text-sm text-dwello-brown">San Diego</p>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-yellow-500 text-lg">★</span>
                                        <span class="text-dwello-brown font-bold ml-1">4.5</span>
                                    </div>
                                </div>
                                <p class="text-dwello-brown leading-relaxed flex-1">
                                    "I had a fantastic experience working with Dwello. Their expertise and personalized service exceeded my expectations. I found my dream home quickly and smoothly. Highly recommended!"
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl overflow-hidden card-shadow h-full flex flex-col">
                            <div class="relative">
                                <img src="{{ asset('im6.png') }}" 
                                     alt="Cozy bedroom" 
                                     class="w-full h-48 object-cover rounded-t-2xl">
                            </div>
                            <div class="p-6 bg-dwello-tan flex-1 flex flex-col">
                                <div class="flex items-center mb-4">
                                    <img src="{{ asset('person3.jpeg') }}" 
                                         alt="Emily Johnson" 
                                         class="w-12 h-12 rounded-full mr-4">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-dwello-brown">Emily Johnson</h4>
                                        <p class="text-sm text-dwello-brown">Los Angeles</p>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-yellow-500 text-lg">★</span>
                                        <span class="text-dwello-brown font-bold ml-1">5.0</span>
                                    </div>
                                </div>
                                <p class="text-dwello-brown leading-relaxed flex-1">
                                    "Dwello made my dream of owning a home a reality! Their team provided exceptional support and guided me through every step of the process. I couldn't be happier with my new home!"
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl overflow-hidden card-shadow h-full flex flex-col">
                            <div class="relative">
                                <img src="{{ asset('im4.png') }}" 
                                     alt="Modern kitchen" 
                                     class="w-full h-48 object-cover rounded-t-2xl">
                            </div>
                            <div class="p-6 bg-dwello-tan flex-1 flex flex-col">
                                <div class="flex items-center mb-4">
                                    <img src="{{ asset('person1.jpeg') }}" 
                                         alt="David Chen" 
                                         class="w-12 h-12 rounded-full mr-4">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-dwello-brown">David Chen</h4>
                                        <p class="text-sm text-dwello-brown">Seattle</p>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-yellow-500 text-lg">★</span>
                                        <span class="text-dwello-brown font-bold ml-1">4.8</span>
                                    </div>
                                </div>
                                <p class="text-dwello-brown leading-relaxed flex-1">
                                    "The team at Dwello went above and beyond to help me find the perfect investment property. Their market knowledge and attention to detail made the entire process seamless and stress-free."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Controls -->
            <div class="flex justify-center mt-12 space-x-4">
                <button id="prevBtn" class="w-12 h-12 bg-dwello-brown text-white rounded-full flex items-center justify-center hover:bg-opacity-90 transition duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button id="nextBtn" class="w-12 h-12 bg-dwello-brown text-white rounded-full flex items-center justify-center hover:bg-opacity-90 transition duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('testimonialsContainer');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const testimonials = container.children;
    const totalTestimonials = testimonials.length;
    let currentIndex = 0;
    
    // Function to update carousel position
    function updateCarousel() {
        const translateX = -currentIndex * (100 / 3); // Show 3 at a time
        container.style.transform = `translateX(${translateX}%)`;
        
        // Update button states
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= totalTestimonials - 3;
        
        // Add visual feedback for disabled buttons
        if (prevBtn.disabled) {
            prevBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            prevBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
        
        if (nextBtn.disabled) {
            nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }
    
    // Previous button click
    prevBtn.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });
    
    // Next button click
    nextBtn.addEventListener('click', function() {
        if (currentIndex < totalTestimonials - 3) {
            currentIndex++;
            updateCarousel();
        }
    });
    
    // Initialize carousel
    updateCarousel();
    
    // Auto-play functionality (optional)
    let autoPlayInterval;
    
    function startAutoPlay() {
        autoPlayInterval = setInterval(() => {
            if (currentIndex < totalTestimonials - 3) {
                currentIndex++;
            } else {
                currentIndex = 0; // Loop back to start
            }
            updateCarousel();
        }, 5000); // Change slide every 5 seconds
    }
    
    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }
    
    // Start auto-play
    startAutoPlay();
    
    // Pause auto-play on hover
    const carousel = document.getElementById('testimonialsCarousel');
    carousel.addEventListener('mouseenter', stopAutoPlay);
    carousel.addEventListener('mouseleave', startAutoPlay);
});
</script>

<!-- Help Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl lg:text-5xl font-bold text-dwello-brown mb-6">
            Do You Have Any Questions?
        </h2>
        <h3 class="text-3xl lg:text-4xl font-bold text-dwello-brown mb-12">
            Get Help From Us
        </h3>
        
        <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-12 mb-12">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-dwello-brown mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    <path d="M9 9l3 3 3-3"/>
                </svg>
                <span class="text-lg text-dwello-brown">Chat live with our support team</span>
            </div>
            <div class="flex items-center">
                <svg class="w-6 h-6 text-dwello-brown mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    <path d="M9 5h6v2H9V5z"/>
                </svg>
                <span class="text-lg text-dwello-brown">Browse our FAQ</span>
            </div>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
            <div class="relative w-full md:w-96">
                <input type="email" 
                       placeholder="Enter your email address..." 
                       class="w-full px-4 py-4 pl-12 bg-dwello-tan rounded-lg border-0 focus:ring-2 focus:ring-dwello-brown focus:outline-none text-dwello-brown placeholder-gray-500">
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-dwello-brown" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <button class="bg-dwello-brown text-white px-8 py-4 rounded-lg font-medium hover:bg-opacity-90 transition duration-300">
                Submit
            </button>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dwello-tan py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8">
            <!-- Logo and Tagline -->
            <div class="md:col-span-1">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('logo.png') }}" alt="Dwello Logo" class="h-8 w-auto">
                </div>
                <p class="text-dwello-brown text-sm leading-relaxed">
                    Bringing you closer to your dream home, one click at a time.
                </p>
            </div>

            <!-- About -->
            <div>
                <h4 class="text-lg font-bold text-dwello-brown mb-4">About</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Our Story</a></li>
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Careers</a></li>
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Our Team</a></li>
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Resources</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="text-lg font-bold text-dwello-brown mb-4">Support</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">FAQ</a></li>
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Contact Us</a></li>
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Help Center</a></li>
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Terms of Service</a></li>
                </ul>
            </div>

            <!-- Find Us -->
            <div>
                <h4 class="text-lg font-bold text-dwello-brown mb-4">Find Us</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Events</a></li>
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Locations</a></li>
                    <li><a href="#" class="text-dwello-brown hover:text-gray-700">Newsletter</a></li>
                </ul>
            </div>

            <!-- Our Social -->
            <div>
                <h4 class="text-lg font-bold text-dwello-brown mb-4">Our Social</h4>
                <ul class="space-y-2">
                    <li class="flex items-center">
                        <div class="w-6 h-6 bg-dwello-brown rounded mr-3 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </div>
                        <span class="text-dwello-brown">Instagram</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-6 h-6 bg-dwello-brown rounded mr-3 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </div>
                        <span class="text-dwello-brown">Facebook</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-6 h-6 bg-dwello-brown rounded mr-3 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </div>
                        <span class="text-dwello-brown">Twitter (x)</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
@endsection
