<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ReferredUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

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
        $users = User::withCount('referredUsers')
            ->with(['referredUsers' => function($query) {
                $query->latest();
            }])
            ->latest()
            ->get();

        $totalUsers = User::count();
        $totalReferredUsers = ReferredUsers::count();
        $totalAdmins = User::where('is_admin', true)->count();
        $recentReferredUsers = ReferredUsers::with(['referrer' => function($query) {
                $query->select('id', 'name', 'referral_link');
            }])
            ->latest()
            ->take(10)
            ->get();

        $monthLabels = [];
        $usersPerMonth = [];
        $referredPerMonth = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $start = $month->copy()->startOfMonth();
            $end = $month->copy()->endOfMonth();
            $monthLabels[] = $month->format('M');
            $usersPerMonth[] = User::whereBetween('created_at', [$start, $end])->count();
            $referredPerMonth[] = ReferredUsers::whereBetween('created_at', [$start, $end])->count();
        }

        return view('admin.dashboard', compact(
            'users', 
            'totalUsers', 
            'totalReferredUsers', 
            'totalAdmins',
            'recentReferredUsers',
            'monthLabels',
            'usersPerMonth',
            'referredPerMonth'
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

    public function editUser(User $user)
    {
        return view('admin.user-edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'phone' => 'nullable|string|max:30',
            'whatsapp' => 'nullable|string|max:255',
            'registration_link' => 'nullable|string|max:255',
        ]);
        DB::table('users')->where('id', $user->id)->update([
            'phone' => $request->input('phone'),
            'whatsapp' => $request->input('whatsapp'),
            'registration_link' => $request->input('registration_link'),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.users.edit', $user->id)->with('success', 'User details updated successfully.');
    }

    public function updateUserBanner(Request $request, User $user)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);
        $file = $request->file('banner');
        $ext = strtolower($file->getClientOriginalExtension());
        $targetDir = public_path('assets/images/user-banners');
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        foreach (['jpg','jpeg','png','webp'] as $e) {
            $existing = $targetDir . DIRECTORY_SEPARATOR . $user->id . '.' . $e;
            if (file_exists($existing)) {
                @unlink($existing);
            }
        }
        $file->move($targetDir, $user->id . '.' . $ext);
        return redirect()->route('admin.users.edit', $user->id)->with('success', 'User banner updated successfully.');
    }
}
