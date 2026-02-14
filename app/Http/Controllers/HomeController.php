<?php

namespace App\Http\Controllers;

use App\Models\ReferredUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $data['referred_users'] = ReferredUsers::where('referral_id', $data['user']->referral_link)->latest()->get();
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
        $user->registration_link = $registration_link;
        $user->whatsapp = $whatsapp;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success', 'CapitalX Registration Link Updated Successfully!');
    }
}
