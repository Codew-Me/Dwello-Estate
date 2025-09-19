@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-dwello-brown mb-2">My Property Inquiries</h1>
                    <p class="text-gray-600">View all your property inquiries and their status</p>
                </div>
                <a href="{{ route('user.dashboard') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                    Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Inquiries List -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            @if($inquiries->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-dwello-beige">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-dwello-brown uppercase tracking-wider">
                                    Property
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-dwello-brown uppercase tracking-wider">
                                    Message
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-dwello-brown uppercase tracking-wider">
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($inquiries as $inquiry)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @php
                                                $propertyDetails = $inquiry->getPropertyDetails();
                                            @endphp
                                            @if($propertyDetails && $propertyDetails['image'])
                                                <img src="{{ asset($propertyDetails['image']) }}" alt="{{ $propertyDetails['title'] }}" class="w-12 h-12 rounded-lg object-cover mr-4">
                                            @else
                                                <div class="w-12 h-12 bg-dwello-brown rounded-lg flex items-center justify-center mr-4">
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="text-sm font-medium text-dwello-brown">{{ $propertyDetails['title'] ?? 'Property #' . $inquiry->property_id }}</div>
                                                <div class="text-sm text-gray-500">{{ $propertyDetails['location'] ?? 'Location not available' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs truncate">{{ $inquiry->message }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $inquiry->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $inquiries->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No inquiries yet</h3>
                    <p class="text-gray-500 mb-6">You haven't sent any property inquiries yet.</p>
                    <a href="{{ route('properties.index') }}" class="bg-dwello-brown text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                        Browse Properties
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
