@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-dwello-brown mb-2">Search Results</h1>
                    @if($query)
                        <p class="text-gray-600">Search results for: <span class="font-semibold text-dwello-brown">"{{ $query }}"</span></p>
                    @else
                        <p class="text-gray-600">Enter a search term to find properties</p>
                    @endif
                </div>
                <a href="/" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                    Back to Home
                </a>
            </div>
        </div>

        <!-- Search Form -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <form action="{{ route('search') }}" method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <input 
                            type="text" 
                            name="q" 
                            value="{{ $query }}" 
                            placeholder="Search by title, description..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent"
                        >
                    </div>
                    <div>
                        <input 
                            type="text" 
                            name="location" 
                            value="{{ $location }}" 
                            placeholder="Location, city, state..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent"
                        >
                    </div>
                    <div>
                        <select 
                            name="type" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent"
                        >
                            <option value="">All Property Types</option>
                            @foreach($propertyTypes as $propertyType)
                                <option value="{{ $propertyType }}" {{ $type == $propertyType ? 'selected' : '' }}>
                                    {{ ucfirst($propertyType) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select 
                            name="price_range" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent"
                        >
                            <option value="">All Price Ranges</option>
                            <option value="0-500000" {{ $priceRange == '0-500000' ? 'selected' : '' }}>Under $500K</option>
                            <option value="500000-1000000" {{ $priceRange == '500000-1000000' ? 'selected' : '' }}>$500K - $1M</option>
                            <option value="1000000-2000000" {{ $priceRange == '1000000-2000000' ? 'selected' : '' }}>$1M - $2M</option>
                            <option value="2000000-5000000" {{ $priceRange == '2000000-5000000' ? 'selected' : '' }}>$2M - $5M</option>
                            <option value="5000000-999999999" {{ $priceRange == '5000000-999999999' ? 'selected' : '' }}>Above $5M</option>
                        </select>
                    </div>
                </div>
                
                <div class="flex justify-center">
                    <button 
                        type="submit" 
                        class="bg-dwello-brown text-white px-8 py-3 rounded-lg hover:bg-opacity-90 transition duration-300 flex items-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search Properties
                    </button>
                </div>
                
                <!-- Active Filters -->
                @if($query || $location || $type || $priceRange)
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="text-sm text-gray-600">Active filters:</span>
                        @if($query)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-dwello-brown text-white">
                                Search: "{{ $query }}"
                                <a href="{{ route('search', ['location' => $location, 'type' => $type, 'price_range' => $priceRange]) }}" class="ml-2 text-white hover:text-gray-200">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </a>
                            </span>
                        @endif
                        @if($location)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-dwello-light-beige text-dwello-brown">
                                Location: "{{ $location }}"
                                <a href="{{ route('search', ['q' => $query, 'type' => $type, 'price_range' => $priceRange]) }}" class="ml-2 text-dwello-brown hover:text-gray-600">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </a>
                            </span>
                        @endif
                        @if($type)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-dwello-light-beige text-dwello-brown">
                                Type: {{ ucfirst($type) }}
                                <a href="{{ route('search', ['q' => $query, 'location' => $location, 'price_range' => $priceRange]) }}" class="ml-2 text-dwello-brown hover:text-gray-600">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </a>
                            </span>
                        @endif
                        @if($priceRange)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-dwello-light-beige text-dwello-brown">
                                Price: {{ $priceRange == '0-500000' ? 'Under $500K' : ($priceRange == '500000-1000000' ? '$500K - $1M' : ($priceRange == '1000000-2000000' ? '$1M - $2M' : ($priceRange == '2000000-5000000' ? '$2M - $5M' : 'Above $5M'))) }}
                                <a href="{{ route('search', ['q' => $query, 'location' => $location, 'type' => $type]) }}" class="ml-2 text-dwello-brown hover:text-gray-600">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </a>
                            </span>
                        @endif
                        @if($query || $location || $type || $priceRange)
                            <a href="{{ route('search') }}" class="text-sm text-dwello-brown hover:text-gray-600 underline">
                                Clear all filters
                            </a>
                        @endif
                    </div>
                @endif
            </form>
        </div>

        <!-- Results -->
        @if($query || $location || $type || $priceRange)
            @if($properties->count() > 0)
                <div class="mb-6">
                    <p class="text-gray-600">
                        Found {{ $properties->total() }} {{ Str::plural('property', $properties->total()) }} matching your search.
                    </p>
                </div>

                <!-- Properties Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($properties as $property)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                            @if($property->image)
                                <img src="{{ asset($property->image) }}" alt="{{ $property->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-dwello-brown flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-lg font-semibold text-dwello-brown">{{ $property->title }}</h3>
                                    @if($property->is_featured)
                                        <span class="bg-dwello-brown text-white px-2 py-1 text-xs font-semibold rounded-full">Featured</span>
                                    @endif
                                </div>
                                
                                <p class="text-gray-600 text-sm mb-3">{{ $property->city }}, {{ $property->state }}</p>
                                
                                <p class="text-gray-700 text-sm mb-4 line-clamp-2">{{ Str::limit($property->description, 100) }}</p>
                                
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                            </svg>
                                            {{ $property->bedrooms }} beds
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                            </svg>
                                            {{ $property->bathrooms }} baths
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                            </svg>
                                            {{ number_format($property->area) }} sq ft
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-dwello-brown">${{ number_format($property->price) }}</span>
                                    <a href="{{ route('properties.show', $property->id) }}" class="bg-dwello-brown text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-300 text-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $properties->appends(['q' => $query, 'location' => $location, 'type' => $type, 'price_range' => $priceRange])->links() }}
                </div>
            @else
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No properties found</h3>
                    <p class="text-gray-500 mb-6">
                        We couldn't find any properties matching your search criteria. Try adjusting your filters or browse all properties.
                    </p>
                    <a href="{{ route('properties.index') }}" class="bg-dwello-brown text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                        Browse All Properties
                    </a>
                </div>
            @endif
        @else
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Search for Properties</h3>
                <p class="text-gray-500 mb-6">Use the search form above to find properties by title, location, type, or price range.</p>
                <a href="{{ route('properties.index') }}" class="bg-dwello-brown text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                    Browse All Properties
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
