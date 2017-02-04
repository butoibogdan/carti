<?php

namespace App\Http\Controllers\FO;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\UserConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail as Mails;
use App\User;

class HomeController extends Controller {

    public function index() {
        return view('FO.content');
    }

    public function accountDetails($id) {
        $id = Crypt::decrypt($id);
        return view('FO.account');
    }

    public function overview(Request $request) {
        $user = Auth::user();
        if ($user->email != $request->email) {
            $array = [
                'userid' => Auth::user()->id,
                'email' => $request->email,
                'status' => 0,
                'uniqid' => uniqid()
            ];
            $last = UserConfirmation::create($array);
            Mail::to($request->email)->send(new Mails($last));
        }
        User::findOrFail(Auth::user()->id)->update(['name' => $request->name]);
        return back();
    }

    public function approve($idu, $idk) {
        $confirmation = UserConfirmation::findOrFail($idu);
        if ($confirmation->status == 0 && $idk == $confirmation->uniqid) {
            $user = User::findOrFail($confirmation->userid);
            $confirmation->update(['status' => 1]);
            $user->update(['email' => $confirmation->email]);
            return redirect('/')->with('flash_message','Mailul a fost schimbat');
        }
        
        return redirect('/')->with('flash_message','Link expirat');
    }
    

}
