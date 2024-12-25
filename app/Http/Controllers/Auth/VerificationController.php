<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('verify');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request)
    {
        // dd($request);
        $user = User::find($request->route('id'));
        auth()->login($user);
        // return $user;

        // return (string) $request->route('hash').' '.sha1($user->getEmailForVerification());

        
        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            // dd($request);
            throw new AuthorizationException;
        }

        // return $user->markEmailAsVerified();

        if ($user->markEmailAsVerified())
        {
            // return $user->markEmailAsVerified();
            event(new Verified($user));
        }
        // dd($request);
        return redirect('/home')->with('verified', true);
        // return redirect('/');
    }
}
