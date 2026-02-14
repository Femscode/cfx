<?php

namespace App\Http\Controllers;

use App\Models\ReferredUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['user'] = Auth::user();
        // Count referrals
        $data['referred_count'] = ReferredUsers::where('referral_id', $data['user']->referral_link)->count();
        // Build monthly referrals for last 12 months
        $labels = [];
        $series = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $start = $month->copy()->startOfMonth();
            $end = $month->copy()->endOfMonth();
            $count = ReferredUsers::where('referral_id', $data['user']->referral_link)
                ->whereBetween('created_at', [$start, $end])
                ->count();
            $labels[] = $month->format('M');
            $series[] = $count;
        }
        $data['chart_labels'] = $labels;
        $data['chart_series'] = $series;
        return view('home', $data);
    }

  
    public function updateRefLink(Request $request)
    {
        $this->validate($request, [
            'registration_link' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'phone' => 'required'
        ]);
        $registration_link = Str::replace(' ', '-', $request->input('registration_link'));
        $whatsapp = Str::replace(' ', '-', $request->input('whatsapp'));
    

        $user = Auth::user();
        DB::table('users')->where('id', $user->id)->update([
            'registration_link' => $registration_link,
            'whatsapp' => $whatsapp,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'CapitalX Registration Link Updated Successfully!');
    }

    public function updateBanner(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $user = Auth::user();
        $file = $request->file('banner');
        $ext = strtolower($file->getClientOriginalExtension());

        $dir = public_path('assets/images/user-banners');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        foreach (['jpg','jpeg','png','webp'] as $e) {
            $path = $dir . DIRECTORY_SEPARATOR . $user->id . '.' . $e;
            if (file_exists($path)) {
                @unlink($path);
            }
        }
        $target = $dir . DIRECTORY_SEPARATOR . $user->id . '.' . $ext;
        $file->move($dir, $user->id . '.' . $ext);

        return redirect()->back()->with('success', 'Your banner has been updated successfully!');
    }

    public function settings()
    {
        $data['user'] = Auth::user();
        return view('user.settings', $data);
    }

    public function media()
    {
        $data['user'] = Auth::user();
        return view('user.media', $data);
    }

    public function referrals()
    {
        $data['user'] = Auth::user();
        $data['referred_users'] = ReferredUsers::where('referral_id', $data['user']->referral_link)->latest()->get();
        return view('user.referrals', $data);
    }
}
