<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inquiry;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminDashboard()
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }
        
        // Get dashboard statistics
        $stats = [
            'total_properties' => 3, // Hardcoded properties count
            'total_users' => User::where('role', 'user')->count(),
            'total_inquiries' => Inquiry::count(),
            'total_messages' => Message::count(),
            'recent_inquiries' => Inquiry::with('user')->latest()->take(5)->get(),
            'recent_messages' => Message::latest()->take(5)->get(),
        ];
        
        return view('admin.dashboard', compact('user', 'stats'));
    }

    public function userDashboard()
    {
        $user = Auth::user();
        if ($user->role !== 'user') {
            abort(403, 'Unauthorized access');
        }
        
        // Get user's inquiries and messages
        $inquiries = $user->inquiries()->latest()->get();
        $messages = $user->messages()->latest()->get();
        
        return view('user.dashboard', compact('user', 'inquiries', 'messages'));
    }

    // Admin user management
    public function users()
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }
        
        $users = User::where('role', 'user')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function admins()
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }
        
        $admins = User::where('role', 'admin')->latest()->paginate(10);
        return view('admin.admins.index', compact('admins'));
    }

    public function createAdmin()
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }
        
        return view('admin.admins.create');
    }

    public function storeAdmin(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin user created successfully.');
    }

    public function destroyUser(User $user)
    {
        $currentUser = Auth::user();
        if ($currentUser->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }
        
        if ($user->id === $currentUser->id) {
            return redirect()->back()
                ->with('error', 'You cannot delete your own account.');
        }
        
        $user->delete();
        
        return redirect()->back()
            ->with('success', 'User deleted successfully.');
    }
}
