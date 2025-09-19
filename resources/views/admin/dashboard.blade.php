@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                            <h1 class="text-3xl font-bold text-dwello-brown mb-2">
                                Welcome Admin
                            </h1>
                    <p class="text-gray-600">Manage your real estate platform</p>
                </div>
                <div class="w-16 h-16 bg-dwello-brown rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Admin Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-dwello-brown">{{ $stats['total_properties'] }}</h3>
                        <p class="text-gray-600">Total Properties</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-dwello-brown">{{ $stats['total_users'] }}</h3>
                        <p class="text-gray-600">Total Users</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-dwello-brown">{{ $stats['total_inquiries'] }}</h3>
                        <p class="text-gray-600">Total Inquiries</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-dwello-brown">{{ $stats['total_messages'] }}</h3>
                        <p class="text-gray-600">Total Messages</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-dwello-brown mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.users.index') }}" class="block w-full bg-dwello-brown text-white py-3 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 text-left">
                        View Users
                    </a>
                    <a href="{{ route('admin.inquiries.index') }}" class="block w-full bg-dwello-light-beige text-dwello-brown py-3 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 text-left">
                        View Inquiries
                    </a>
                    <a href="{{ route('admin.messages.index') }}" class="block w-full bg-dwello-light-beige text-dwello-brown py-3 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 text-left">
                        View Messages
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-dwello-brown mb-4">Recent Inquiries</h3>
                <div class="space-y-3">
                    @forelse($stats['recent_inquiries'] as $inquiry)
                        <div class="border-l-4 border-dwello-brown pl-3">
                            <p class="text-sm font-medium text-dwello-brown">{{ $inquiry->user->name }}</p>
                            <p class="text-xs text-gray-600">{{ $inquiry->getPropertyDetails()['title'] ?? 'Property #' . $inquiry->property_id }}</p>
                            <p class="text-xs text-gray-500">{{ $inquiry->created_at->diffForHumans() }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">No recent inquiries</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-dwello-brown mb-4">Recent Messages</h3>
                <div class="space-y-3">
                    @forelse($stats['recent_messages'] as $message)
                        <div class="border-l-4 border-orange-400 pl-3">
                            <p class="text-sm font-medium text-dwello-brown">{{ $message->name }}</p>
                            <p class="text-xs text-gray-600">{{ $message->subject }}</p>
                            <p class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">No recent messages</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="mt-8">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-dwello-brown mb-4">Admin Profile</h3>
                <div class="flex items-center mb-6">
                    <div class="w-20 h-20 bg-dwello-brown rounded-full flex items-center justify-center mr-6">
                        <span class="text-white font-bold text-2xl">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-dwello-brown">{{ $user->name }}</h4>
                        <p class="text-gray-600">{{ $user->email }}</p>
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800 mt-2">
                            Administrator
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex items-center p-4 bg-dwello-beige rounded-lg">
                        <div class="w-10 h-10 bg-dwello-brown rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dwello-brown">Account Status</p>
                            <p class="text-xs text-green-600">Active</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-dwello-beige rounded-lg">
                        <div class="w-10 h-10 bg-dwello-brown rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dwello-brown">Admin Since</p>
                            <p class="text-xs text-gray-600">{{ $user->created_at->format('F Y') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-dwello-beige rounded-lg">
                        <div class="w-10 h-10 bg-dwello-brown rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dwello-brown">Access Level</p>
                            <p class="text-xs text-red-600">Full Access</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
