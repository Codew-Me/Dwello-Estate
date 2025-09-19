@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-dwello-brown mb-2">
                        Welcome {{ explode(' ', $user->name)[0] }}
                    </h1>
                    <p class="text-gray-600">Find your dream home with Dwello</p>
                </div>
                <div class="w-16 h-16 bg-dwello-brown rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- User Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-dwello-brown">{{ $inquiries->count() }}</h3>
                        <p class="text-gray-600">Property Inquiries</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-dwello-brown">{{ $messages->count() }}</h3>
                        <p class="text-gray-600">Contact Messages</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-dwello-brown">{{ $inquiries->count() + $messages->count() }}</h3>
                        <p class="text-gray-600">Total Interactions</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-dwello-brown mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    @if($inquiries->count() > 0)
                        <a href="{{ route('user.inquiries.index') }}" class="block w-full bg-dwello-brown text-white py-3 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 text-left">
                            View My Inquiries ({{ $inquiries->count() }})
                        </a>
                    @endif
                    @if($messages->count() > 0)
                        <a href="{{ route('user.messages.index') }}" class="block w-full bg-dwello-light-beige text-dwello-brown py-3 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 text-left">
                            View My Messages ({{ $messages->count() }})
                        </a>
                    @endif
                    @if($inquiries->count() == 0 && $messages->count() == 0)
                        <div class="text-center py-4">
                            <p class="text-gray-500 text-sm">No inquiries or messages yet</p>
                            <p class="text-gray-400 text-xs mt-1">Start by browsing properties or contacting us!</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-dwello-brown mb-4">Profile Information</h3>
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-dwello-brown rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold text-xl">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-dwello-brown">{{ $user->name }}</h4>
                        <p class="text-gray-600">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center p-3 bg-dwello-beige rounded-lg">
                        <div class="w-8 h-8 bg-dwello-brown rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dwello-brown">Account Type</p>
                            <p class="text-xs text-gray-600 capitalize">{{ $user->role }}</p>
                        </div>
                    </div>
                    <div class="flex items-center p-3 bg-dwello-beige rounded-lg">
                        <div class="w-8 h-8 bg-dwello-brown rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dwello-brown">Member Since</p>
                            <p class="text-xs text-gray-600">{{ $user->created_at->format('F Y') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center p-3 bg-dwello-beige rounded-lg">
                        <div class="w-8 h-8 bg-dwello-brown rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dwello-brown">Account Status</p>
                            <p class="text-xs text-green-600">Active</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="mt-8 bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-bold text-dwello-brown mb-4">Recent Activity</h3>
            <div class="space-y-4">
                @forelse($inquiries->take(3) as $inquiry)
                    <div class="flex items-center p-3 bg-dwello-beige rounded-lg">
                        <div class="w-8 h-8 bg-dwello-brown rounded-full flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-dwello-brown font-medium">Inquired about {{ $inquiry->getPropertyDetails()['title'] ?? 'Property #' . $inquiry->property_id }}</p>
                            <p class="text-sm text-gray-600">{{ $inquiry->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    @forelse($messages->take(3) as $message)
                        <div class="flex items-center p-3 bg-dwello-beige rounded-lg">
                            <div class="w-8 h-8 bg-dwello-brown rounded-full flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-dwello-brown font-medium">Sent message: {{ $message->subject }}</p>
                                <p class="text-sm text-gray-600">{{ $message->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-gray-500">No recent activity</p>
                            <p class="text-sm text-gray-400">Start by browsing properties or contacting us!</p>
                        </div>
                    @endforelse
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
