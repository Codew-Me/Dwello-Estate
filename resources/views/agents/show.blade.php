@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Professional Agent Header -->
        <div class="bg-white rounded-3xl shadow-xl p-8 mb-8 border border-gray-100">
            <div class="flex flex-col lg:flex-row items-center lg:items-start space-y-6 lg:space-y-0 lg:space-x-8">
                <!-- Profile Image -->
                <div class="flex-shrink-0">
                    @if($agent->image)
                        <img src="{{ asset('storage/' . $agent->image) }}" alt="{{ $agent->name }}" class="w-32 h-32 rounded-full object-cover border-4 border-dwello-brown shadow-lg">
                    @else
                        <div class="w-32 h-32 bg-gradient-to-br from-dwello-brown to-dwello-light-beige rounded-full flex items-center justify-center border-4 border-dwello-brown shadow-lg">
                            <span class="text-white text-4xl font-bold">{{ substr($agent->name, 0, 1) }}</span>
                        </div>
                    @endif
                </div>
                
                <!-- Agent Info -->
                <div class="flex-1 text-center lg:text-left">
                    <div class="mb-4">
                        <h1 class="text-4xl font-bold text-dwello-brown mb-2">{{ $agent->name }}</h1>
                        <p class="text-xl text-gray-700 font-medium mb-3">{{ $agent->specialization ?? 'Real Estate Professional' }}</p>
                        
                        <!-- Professional Badge -->
                        <div class="inline-flex items-center bg-gradient-to-r from-dwello-brown to-dwello-light-beige text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            {{ $agent->experience_years }}+ Years Experience
                        </div>
                    </div>
                    
                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 text-center">
                        <div class="bg-gray-50 rounded-xl p-3">
                            <div class="text-2xl font-bold text-dwello-brown">150+</div>
                            <div class="text-sm text-gray-600">Properties Sold</div>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-3">
                            <div class="text-2xl font-bold text-dwello-brown">98%</div>
                            <div class="text-sm text-gray-600">Client Satisfaction</div>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-3 col-span-2 lg:col-span-1">
                            <div class="text-2xl font-bold text-dwello-brown">24/7</div>
                            <div class="text-sm text-gray-600">Available</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Professional Bio -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-dwello-brown to-dwello-light-beige rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-dwello-brown">About {{ $agent->name }}</h2>
                    </div>
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ $agent->bio }}</p>
                        
                        <!-- Professional Highlights -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                            <div class="bg-gradient-to-r from-dwello-beige to-dwello-tan rounded-2xl p-6">
                                <h4 class="font-bold text-dwello-brown mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    Expertise
                                </h4>
                                <p class="text-gray-700 text-sm">Specialized in {{ $agent->specialization ?? 'luxury real estate' }} with deep market knowledge and proven track record.</p>
                            </div>
                            
                            <div class="bg-gradient-to-r from-dwello-beige to-dwello-tan rounded-2xl p-6">
                                <h4 class="font-bold text-dwello-brown mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    Service
                                </h4>
                                <p class="text-gray-700 text-sm">Dedicated to providing exceptional service with 24/7 availability and personalized attention to every client.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Credentials & Achievements -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-dwello-brown to-dwello-light-beige rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-dwello-brown">Credentials & Achievements</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                                <div class="w-10 h-10 bg-dwello-brown rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-dwello-brown">Licensed Real Estate Agent</h4>
                                    <p class="text-sm text-gray-600">State Certified Professional</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                                <div class="w-10 h-10 bg-dwello-brown rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-dwello-brown">Top Performer Award</h4>
                                    <p class="text-sm text-gray-600">2023 & 2024 Excellence</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                                <div class="w-10 h-10 bg-dwello-brown rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-dwello-brown">Client Relations Expert</h4>
                                    <p class="text-sm text-gray-600">98% Satisfaction Rate</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                                <div class="w-10 h-10 bg-dwello-brown rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-dwello-brown">Market Analysis Specialist</h4>
                                    <p class="text-sm text-gray-600">Advanced Pricing Strategies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Contact Information -->
                <div class="bg-white rounded-3xl shadow-xl p-6 border border-gray-100">
                    <h3 class="text-2xl font-bold text-dwello-brown mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contact Information
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                            <div class="w-12 h-12 bg-dwello-brown rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-dwello-brown">Email</p>
                                <a href="mailto:{{ $agent->email }}" class="text-gray-600 hover:text-dwello-brown transition duration-300">{{ $agent->email }}</a>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                            <div class="w-12 h-12 bg-dwello-brown rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-dwello-brown">Phone</p>
                                <a href="tel:{{ $agent->phone }}" class="text-gray-600 hover:text-dwello-brown transition duration-300">{{ $agent->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Get in Touch -->
                <div class="bg-white rounded-3xl shadow-xl p-6 border border-gray-100">
                    <h3 class="text-2xl font-bold text-dwello-brown mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Get in Touch
                    </h3>
                    
                    <div class="space-y-4">
                        <a href="mailto:{{ $agent->email }}" class="block w-full bg-gradient-to-r from-dwello-brown to-dwello-light-beige text-white py-4 px-6 rounded-xl hover:shadow-lg transition duration-300 text-center font-semibold">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Send Email
                        </a>
                        <a href="tel:{{ $agent->phone }}" class="block w-full bg-dwello-light-beige text-dwello-brown py-4 px-6 rounded-xl hover:shadow-lg transition duration-300 text-center font-semibold border-2 border-dwello-brown">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Call Now
                        </a>
                        <a href="{{ route('properties.index') }}" class="block w-full bg-dwello-light-beige text-dwello-brown py-4 px-6 rounded-xl hover:shadow-lg transition duration-300 text-center font-semibold border-2 border-dwello-brown">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            </svg>
                            View Properties
                        </a>
                    </div>
                </div>

                <!-- Specialization -->
                @if($agent->specialization)
                    <div class="bg-white rounded-3xl shadow-xl p-6 border border-gray-100">
                        <h3 class="text-2xl font-bold text-dwello-brown mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Specialization
                        </h3>
                        <div class="bg-gradient-to-r from-dwello-beige to-dwello-tan rounded-xl p-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-dwello-brown rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-dwello-brown text-lg">{{ $agent->specialization }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

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
