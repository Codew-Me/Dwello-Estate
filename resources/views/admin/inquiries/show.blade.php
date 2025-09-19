@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-dwello-brown mb-2">Inquiry Details</h1>
                    <p class="text-gray-600">View and manage property inquiry</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                    Back to Inquiries
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Inquiry Details -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-dwello-brown mb-4">Inquiry Information</h2>
                
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Date:</span>
                        <span class="font-medium text-dwello-brown">{{ $inquiry->created_at->format('M d, Y \a\t g:i A') }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">User:</span>
                        <span class="font-medium text-dwello-brown">{{ $inquiry->user->name }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Email:</span>
                        <span class="font-medium text-dwello-brown">{{ $inquiry->user->email }}</span>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-dwello-brown mb-2">Message</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700">{{ $inquiry->message }}</p>
                    </div>
                </div>
                
            </div>

            <!-- Property Details -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-dwello-brown mb-4">Property Details</h2>
                
                @php
                    $propertyDetails = $inquiry->getPropertyDetails();
                @endphp
                
                @if($propertyDetails)
                    <div class="space-y-4">
                        <div>
                            <h3 class="font-semibold text-dwello-brown">{{ $propertyDetails['title'] }}</h3>
                            <p class="text-gray-600">{{ $propertyDetails['location'] }}</p>
                        </div>
                        
                        <div class="flex justify-between">
                            <span class="text-gray-600">Price:</span>
                            <span class="font-bold text-dwello-brown">${{ number_format($propertyDetails['price']) }}</span>
                        </div>
                        
                        <div class="mt-6">
                            <a href="{{ route('properties.show', $inquiry->property_id) }}" class="w-full bg-dwello-brown text-white py-2 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 text-center block">
                                View Property Details
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center text-gray-500">
                        <p>Property details not available</p>
                        <p class="text-sm">Property ID: {{ $inquiry->property_id }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
