<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ReferredUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        // Get all users with their referred users count
        $users = User::withCount('referredUsers')
            ->with(['referredUsers' => function($query) {
                $query->latest();
            }])
            ->latest()
            ->get();

        // Get total statistics
        $totalUsers = User::count();
        $totalReferredUsers = ReferredUsers::count();
        $totalAdmins = User::where('is_admin', true)->count();
        
        // Get recent referred users
        $recentReferredUsers = ReferredUsers::with(['referrer' => function($query) {
                $query->select('id', 'name', 'referral_link');
            }])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'users', 
            'totalUsers', 
            'totalReferredUsers', 
            'totalAdmins',
            'recentReferredUsers'
        ));
    }

    /**
     * Toggle admin status for a user.
     */
    public function toggleAdmin(Request $request, User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->back()->with('success', 
            $user->is_admin ? 'User promoted to admin successfully!' : 'Admin privileges removed successfully!'
        );
    }

    /**
     * Show referred users for a specific user.
     */
    public function userReferrals(User $user)
    {
        $referredUsers = ReferredUsers::where('referral_id', $user->referral_link)
            ->latest()
            ->get();

        return view('admin.user-referrals', compact('user', 'referredUsers'));
    }

    /**
     * Show all referred users in the application.
     */
    public function allReferredUsers()
    {
        $allReferredUsers = ReferredUsers::with(['referrer' => function($query) {
                $query->select('id', 'name', 'email', 'referral_link');
            }])
            ->latest()
            ->get();

        $totalReferredUsers = $allReferredUsers->count();
        $totalReferrers = User::whereHas('referredUsers')->count();
        $avgReferralsPerUser = $totalReferrers > 0 ? round($totalReferredUsers / $totalReferrers, 1) : 0;

        return view('admin.all-referred-users', compact(
            'allReferredUsers',
            'totalReferredUsers',
            'totalReferrers',
            'avgReferralsPerUser'
        ));
    }

    /**
     * Update the referral banner image (single image stored under public/assets/images).
     */
    public function updateBanner(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $file = $request->file('banner');
        $ext = strtolower($file->getClientOriginalExtension());

        $targetDir = public_path('assets/images');
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Remove existing banner files with known extensions to keep only one active banner
        foreach (['jpg', 'jpeg', 'png', 'webp'] as $e) {
            $existing = $targetDir . DIRECTORY_SEPARATOR . 'referral-banner.' . $e;
            if (file_exists($existing)) {
                @unlink($existing);
            }
        }

        $targetName = 'referral-banner.' . $ext;
        $file->move($targetDir, $targetName);

        return redirect()->route('admin.dashboard')->with('success', 'Referral banner updated successfully!');
    }

    /**
     * Delete a referred user.
     */
    public function deleteReferredUser($id)
    {
        try {
            $referredUser = ReferredUsers::findOrFail($id);
            $referredUser->delete();
            
            return redirect()->back()->with('message','Referred user deleted successfully!');
            return response()->json([
                'success' => true,
                'message' => 'Referred user deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Error deleting referred user: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting referred user: ' . $e->getMessage()
            ], 500);
        }
    }
}
