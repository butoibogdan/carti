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
            Mail::to($request->email)->send(new Mails($last, 'email_reset'));
        }
        User::findOrFail(Auth::user()->id)->update(['name' => $request->name]);
        return back()->with('flash_message', 'Va rog confirmati linkul din mail');
    }

    private function user_update($idu, $idk, $type) {
        $confirmation = UserConfirmation::findOrFail($idu);
        if ($confirmation->status == 0 && $idk == $confirmation->uniqid) {
            $user = User::findOrFail($confirmation->userid);
            $confirmation->update(['status' => 1]);
            $user->update(["$type" => $confirmation->{$type}]);
            return true; 
        }
        return false;
    }

    public function approve($idu, $idk) {
        $result=$this->user_update($idu, $idk, 'email');
        if($result){
          return  redirect('/')->with('flash_message', 'Mailul a fost modificate');
        } 
        return redirect('/')->with('flash_message', 'Link expirat');
    }

    public function password_reset($idu, $idk) {
        $result=$this->user_update($idu, $idk, 'password');
        if($result) {
          return  redirect('/')->with('flash_message', 'Parola a fost modificate');
        } 
        return redirect('/')->with('flash_message', 'Link expirat');
    }

    public function password(Request $request) {

        $this->validate($request, [
            'old_password' => "required|current_password:" . Auth::user()->password,
            'password' => 'required|min:6|confirmed',
        ]);

        $last = UserConfirmation::create([
                    'userid' => Auth::user()->id,
                    'password' => bcrypt($request->password),
                    'status' => 0,
                    'uniqid' => uniqid()
        ]);

        Mail::to(Auth::user()->email)->send(new Mails($last, 'password_reset'));
        return back()->with('flash_message', 'Va rog confirmati linkul din mail');
    }
    
    public function accountconfirmation($id){
        $user=User::findOrFail(Crypt::decrypt($id));    
        if($user->usertype==2){
            $user->usertype=0;
            $user->save();
            return back()->with('flash_message', 'Contul a fost activat cu succes');
        }
        return abort(404);
        
    }

}
