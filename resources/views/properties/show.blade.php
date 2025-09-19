@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Property Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-3xl font-bold text-dwello-brown mb-2">{{ $property->title }}</h1>
                    <p class="text-xl text-gray-600">{{ $property->location }}</p>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-dwello-brown">${{ number_format($property->price) }}</div>
                    @if($property->featured)
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800 mt-2">
                            Featured Property
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="flex items-center space-x-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    <span class="text-gray-600">{{ $property->bedrooms }} Bedrooms</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                    </svg>
                    <span class="text-gray-600">{{ $property->bathrooms }} Bathrooms</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                    </svg>
                    <span class="text-gray-600">{{ number_format($property->area) }} sq ft</span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-600 capitalize">{{ $property->type }}</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Property Images -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    @if($property->image)
                        <img src="{{ asset($property->image) }}" alt="{{ $property->title }}" class="w-full h-96 object-cover">
                    @else
                        <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                            <svg class="h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            </svg>
                        </div>
                    @endif
                    
                    <!-- Gallery section removed for hardcoded properties -->
                </div>

                <!-- Property Description -->
                <div class="mt-8 bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-dwello-brown mb-4">About This Property</h2>
                    <p class="text-gray-700 leading-relaxed">{{ $property->description }}</p>
                </div>
            </div>

            <!-- Property Details & Inquiry -->
            <div class="space-y-6">
                <!-- Property Details -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-dwello-brown mb-4">Property Details</h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Property Type:</span>
                            <span class="font-medium text-dwello-brown capitalize">{{ $property->type }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Price:</span>
                            <span class="font-bold text-dwello-brown">${{ number_format($property->price) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Bedrooms:</span>
                            <span class="font-medium text-dwello-brown">{{ $property->bedrooms }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Bathrooms:</span>
                            <span class="font-medium text-dwello-brown">{{ $property->bathrooms }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Area:</span>
                            <span class="font-medium text-dwello-brown">{{ number_format($property->area) }} sq ft</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $property->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $property->status ? 'Available' : 'Sold' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Inquiry Form -->
                @if($property->status)
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-dwello-brown mb-4">Interested in this property?</h3>
                        
                        @auth
                            <form action="{{ route('inquiries.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                
                                <div class="space-y-4">
                                    <div>
                                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Your Message</label>
                                        <textarea name="message" id="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent" required placeholder="Tell us about your interest in this property..."></textarea>
                                        @error('message')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="w-full bg-dwello-brown text-white py-3 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 font-medium">
                                        Send Inquiry
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="text-center">
                                <p class="text-gray-600 mb-4">Please login to send an inquiry about this property.</p>
                                <div class="space-y-2">
                                    <a href="{{ route('login') }}" class="block w-full bg-dwello-brown text-white py-3 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 font-medium">
                                        Login to Inquire
                                    </a>
                                    <a href="{{ route('register') }}" class="block w-full bg-dwello-light-beige text-dwello-brown py-3 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 font-medium">
                                        Create Account
                                    </a>
                                </div>
                            </div>
                        @endauth
                    </div>
                @else
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Property Sold</h3>
                            <p class="text-gray-600">This property is no longer available.</p>
                        </div>
                    </div>
                @endif

                <!-- Contact Agent -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-dwello-brown mb-4">Need Help?</h3>
                    <p class="text-gray-600 mb-4">Our experienced agents are here to help you find your dream home.</p>
                    <a href="{{ route('agents.index') }}" class="w-full bg-dwello-light-beige text-dwello-brown py-3 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 font-medium text-center block">
                        View Our Agents
                    </a>
                </div>
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
