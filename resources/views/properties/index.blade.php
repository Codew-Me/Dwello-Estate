@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-dwello-brown mb-4">Our Properties</h1>
            <p class="text-xl text-gray-600">Discover your dream home from our curated collection</p>
        </div>

        <!-- Properties Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($properties as $property)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <!-- Property Image -->
                    <div class="relative h-64">
                        @if($property->image)
                            <img src="{{ asset($property->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('i' . ($loop->iteration) . '.png') }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                        @endif
                        @if($property->is_featured)
                            <div class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Featured
                            </div>
                        @endif
                    </div>

                    <!-- Property Details -->
                    <div class="p-6 bg-dwello-tan">
                        <!-- Location -->
                        <div class="flex items-center mb-3">
                            <svg class="w-4 h-4 text-black mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <span class="text-black font-medium text-sm">{{ $property->city }}, {{ $property->state }}</span>
                        </div>

                        <!-- Rooms -->
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-black mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 9V6a2 2 0 00-2-2H6a2 2 0 00-2 2v3m16 0v9a2 2 0 01-2 2H6a2 2 0 01-2-2V9m16 0H4m8 3v6m-3-3h6"/>
                            </svg>
                            <span class="text-black text-sm">{{ $property->bedrooms }} Rooms</span>
                        </div>

                        <!-- Area -->
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-black mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                            </svg>
                            <span class="text-black text-sm">{{ number_format($property->area) }} sq ft</span>
                        </div>

                        <!-- Price and Button -->
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-bold text-black">
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
            @empty
                <div class="col-span-full text-center py-12">
                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No properties available</h3>
                    <p class="text-gray-600">Check back later for new listings.</p>
                </div>
            @endforelse
        </div>

        @if($properties->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $properties->links() }}
            </div>
        @endif
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

<!-- Inquiry Modal -->
@auth
<div id="inquiryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-dwello-brown">Send Inquiry</h3>
                <button onclick="closeInquiryModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="inquiryForm" method="POST" action="{{ route('inquiries.store') }}">
                @csrf
                <input type="hidden" id="propertyId" name="property_id">
                
                <div class="mb-4">
                    <p class="text-sm text-gray-600">Property: <span id="propertyTitle" class="font-medium"></span></p>
                </div>
                
                <div class="mb-4">
                    <label for="inquiryMessage" class="block text-sm font-medium text-gray-700 mb-2">Your Message</label>
                    <textarea name="message" id="inquiryMessage" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent" required placeholder="Tell us about your interest in this property..."></textarea>
                </div>
                
                <div class="flex space-x-3">
                    <button type="button" onclick="closeInquiryModal()" class="flex-1 bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-opacity-90 transition duration-300">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-dwello-brown text-white py-2 px-4 rounded-lg hover:bg-opacity-90 transition duration-300">
                        Send Inquiry
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openInquiryModal(propertyId, propertyTitle) {
    document.getElementById('propertyId').value = propertyId;
    document.getElementById('propertyTitle').textContent = propertyTitle;
    document.getElementById('inquiryModal').classList.remove('hidden');
}

function closeInquiryModal() {
    document.getElementById('inquiryModal').classList.add('hidden');
    document.getElementById('inquiryForm').reset();
}
</script>
@endauth
@endsection
