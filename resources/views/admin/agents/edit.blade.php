@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-dwello-brown mb-2">Edit Agent</h1>
                    <p class="text-gray-600">Update agent information and details</p>
                </div>
                <a href="{{ route('admin.agents.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                    Back to Agents
                </a>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <form action="{{ route('admin.agents.update', $agent) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $agent->name) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $agent->email) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone', $agent->phone) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent" required>
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Specialization -->
                    <div>
                        <label for="specialization" class="block text-sm font-medium text-gray-700 mb-2">Specialization</label>
                        <input type="text" name="specialization" id="specialization" value="{{ old('specialization', $agent->specialization) }}" placeholder="e.g., Luxury Properties, First-time Buyers" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent">
                        @error('specialization')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Experience Years -->
                    <div>
                        <label for="experience_years" class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
                        <input type="number" name="experience_years" id="experience_years" value="{{ old('experience_years', $agent->experience_years) }}" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent" required>
                        @error('experience_years')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Image -->
                    @if($agent->image)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Profile Image</label>
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/' . $agent->image) }}" alt="Current image" class="w-24 h-24 object-cover rounded-full">
                                <div>
                                    <p class="text-sm text-gray-600">Current agent profile image</p>
                                    <p class="text-xs text-gray-500">Upload a new image below to replace it</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
                        <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bio -->
                    <div class="md:col-span-2">
                        <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                        <textarea name="bio" id="bio" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dwello-brown focus:border-transparent" required placeholder="Tell us about the agent's background, achievements, and approach to real estate...">{{ old('bio', $agent->bio) }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="status" value="1" {{ old('status', $agent->status) ? 'checked' : '' }} class="h-4 w-4 text-dwello-brown focus:ring-dwello-brown border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-700">Active Agent</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.agents.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-dwello-brown text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                        Update Agent
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
