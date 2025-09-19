@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-dwello-brown mb-2">Manage Agents</h1>
                    <p class="text-gray-600">Add, edit, and manage real estate agents</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('admin.agents.create') }}" class="bg-dwello-brown text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                        Add New Agent
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                        Back to Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Agents Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Agent</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialization</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Experience</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($agents as $agent)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($agent->image)
                                            <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('storage/' . $agent->image) }}" alt="{{ $agent->name }}">
                                        @else
                                            <div class="h-12 w-12 rounded-full bg-dwello-brown flex items-center justify-center">
                                                <span class="text-white font-medium">{{ substr($agent->name, 0, 1) }}</span>
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $agent->name }}</div>
                                            <div class="text-sm text-gray-500 max-w-xs truncate">{{ $agent->bio }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $agent->email }}</div>
                                    <div class="text-sm text-gray-500">{{ $agent->phone }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $agent->specialization ?? 'General' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $agent->experience_years }}+ years</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $agent->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $agent->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.agents.edit', $agent) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('admin.agents.destroy', $agent) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this agent?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">No agents found. <a href="{{ route('admin.agents.create') }}" class="text-dwello-brown hover:underline">Add your first agent</a></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($agents->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $agents->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
