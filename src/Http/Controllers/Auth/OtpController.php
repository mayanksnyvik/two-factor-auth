<?php

namespace Mayanksnyvik\TwoFactorAuth\Http\Controllers\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Auth\LoginController as BaseLoginController;
use Illuminate\Http\Request;
use App\Mail\SendLoginOtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Mayanksnyvik\TwoFactorAuth\Mail\SendOtpMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class OtpController extends BaseLoginController
{

    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['indexAction', 'verifyAction', 'resendAction']);;
    }

    public function indexAction(){
        $user = auth()->user();
        if(session()->has('2fa_verified')){
            return redirect()->route('home');
        }
        if($user->otp == null){
            $this->sendLoginOtp();
        }
        return view('mayanksnyvik.two-factor-auth::auth.otp');
    }


    public static function sendLoginOtp(){
        $user = auth()->user();
        $otp = random_int(100000, 999999);
        DB::table('users')->where('id', $user->id)->update(['otp' => $otp]);
        try{
            Log::info('send OTP ['.$otp.'] mail to user ['.$user->email.']');
            $subject = 'Your Two-Factor Authentication Code';
            Mail::to($user->email)->send(new SendOtpMail($otp,$subject));
        }catch(Exception $e){
            Log::error($e);
        }
    }

    public function resendAction(Request $request){
        $user = auth()->user();
        $this->sendLoginOtp();
        Session::flash('resent', true);
        return redirect()->back();
    }

    public function verifyAction(Request $request){
        $request->validate([
            'otp' => 'required|min:6|max:6'
        ]);
        $user = auth()->user();
        if($request->otp == $user->otp){
            DB::table('users')->where('id', $user->id)->update(['otp' => null]);
            Session::put('2fa_verified', true);
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Incorrect 2FA code. Try re-entering the code');
    }


    public function logout(Request $request)
    {
        session()->forget('2fa_verified');
        Auth::logout();
        return redirect()->route('login'); // Adjust as necessary
    }

    
}
