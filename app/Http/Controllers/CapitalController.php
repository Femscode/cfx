<?php

namespace App\Http\Controllers;

use App\Models\ReferredUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CapitalController extends Controller
{
    //
    public function refer_page($slug)
    {

        $data['slug'] = $slug;
        return view('ref_page', $data);
    }
    public function saveRef(Request $request)
    {
        $referral_id = $request->input('referral_id');
        $this->validate($request, [
            'referral_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $check = ReferredUsers::where('email', $request->input('email'))
            ->where('phone', $request->input('phone'))
            ->where('referral_id', $referral_id)
            ->first();
        if ($check) {
            $data['referral_id'] = $referral_id;
            $data['user'] = $ref2 =  User::where('referral_link', $referral_id)->first();
            $redirect_link = $ref2->whatsapp;
            return redirect($redirect_link);
            return view('nextstep', $data);
        }
        $ref = ReferredUsers::create([
            'referral_id' => $referral_id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        if ($ref) {
            $data['referral_id'] = $referral_id;
            $data['user'] = $ref2 = User::where('referral_link', $referral_id)->first();
            $redirect_link = $ref2->whatsapp;
            return redirect($redirect_link);
            // return view('nextstep', $data);
        } else {
            return redirect()->back()->with('error', 'Unable to save, try again later!');
        }
    }
    public function nextStep($slug)
    {


        $ref = User::where('referral_link', $slug)->first();

        if ($ref) {
            $data['referral_id'] = $slug;
            $data['user'] = User::where('referral_link', $slug)->first();
            return view('nextstep', $data);
        } else {
            return redirect('https://www.capitalxtendfx.com');
        }
    }
}
