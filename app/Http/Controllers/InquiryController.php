<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|in:1,2,3', // Only allow hardcoded property IDs
            'message' => 'required|string|max:1000',
        ]);

        Inquiry::create([
            'user_id' => Auth::id(),
            'property_id' => $request->property_id,
            'message' => $request->message,
        ]);

        return redirect()->back()
            ->with('success', 'Your inquiry has been sent successfully.');
    }

    public function userIndex()
    {
        $user = Auth::user();
        if ($user->role !== 'user') {
            abort(403, 'Unauthorized access');
        }

        $inquiries = $user->inquiries()->latest()->paginate(10);
        return view('user.inquiries.index', compact('inquiries'));
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $inquiries = Inquiry::with('user')->latest()->paginate(10);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        return view('admin.inquiries.show', compact('inquiry'));
    }


    public function destroy(Inquiry $inquiry)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Inquiry deleted successfully.');
    }
}