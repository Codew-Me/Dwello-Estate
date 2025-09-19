@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dwello-beige py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-dwello-brown mb-2">Message Details</h1>
                    <p class="text-gray-600">View and manage contact message</p>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-300">
                    Back to Messages
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Message Details -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-dwello-brown mb-4">Message Information</h2>
                
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Date:</span>
                        <span class="font-medium text-dwello-brown">{{ $message->created_at->format('M d, Y \a\t g:i A') }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">From:</span>
                        <span class="font-medium text-dwello-brown">{{ $message->name }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Email:</span>
                        <span class="font-medium text-dwello-brown">{{ $message->email }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subject:</span>
                        <span class="font-medium text-dwello-brown">{{ $message->subject }}</span>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-dwello-brown mb-2">Message</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $message->message }}</p>
                    </div>
                </div>
                
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-dwello-brown mb-4">Contact Information</h2>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-dwello-brown rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-medium text-lg">{{ substr($message->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="font-semibold text-dwello-brown">{{ $message->name }}</p>
                            <p class="text-gray-600">{{ $message->email }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-dwello-brown mb-2">Quick Actions</h3>
                        <div class="space-y-2">
                            <a href="mailto:{{ $message->email }}" class="block w-full bg-dwello-brown text-white py-2 px-4 rounded-lg hover:bg-opacity-90 transition duration-300 text-center">
                                Reply via Email
                            </a>
                            <button onclick="copyToClipboard('{{ $message->email }}')" class="w-full bg-dwello-light-beige text-dwello-brown py-2 px-4 rounded-lg hover:bg-opacity-90 transition duration-300">
                                Copy Email Address
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Email address copied to clipboard!');
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}
</script>
@endsection
