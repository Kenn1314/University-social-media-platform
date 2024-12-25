<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function loginPage() {
        $users = User::select('student_id', 'personal_login_phrase')->get();
        return view('auth.login', ['users' => $users]);
    }

    public function get_LoginID(Request $req)
    {
        // VALIDATE THE STUDENT ID IS EMPTY OR NOT AND  STUDENT ID EXISTED IN OUR DATABASE OR NOT
        $req->validate([
            'student_id' => ['required', 'exists:users,student_id'],
        ]);

        //=================================================================
        // $validator = Validator::make($req->only('student_id'), [
        //     'student_id' => ['required', 'exists:users,student_id']
        // ]);

        // // IF THE STUDENT_ID NOT EXISTED IN THE TABLE
        // if($validator->fails()) {
        //     return 'Not existed';
        // }
        //=================================================================

        $valid_id = true;

        //=====IF THE STUDENT ID CAN BE FOUND=====
        // STORE STUDENT_ID TO FLASH SESSION
        $req->session()->flash('student_id', $req->student_id);
        
        // GET THE SPECIFIC USER
        $log_user = User::where('student_id', $req->student_id)->first();        

        return view('auth.login', ['valid_id' => $valid_id]);
    }

    public function toPasswordPage(Request $req) {
        return view('auth.password', ['student_id' => $req['student_id']]);
    }

    public function login(Request $req) {
        
        // =====VALIDATE PASSWORD FIELD BASED ON CERTAIN CRITERIA=====
        $validate = Validator::make($req->all(), [
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput(); // RETURN ERROR AND INPUT ENTERED BY USER
        }

        //=====CHECK EMAIL AND PASSWORD=====
        if (auth()->attempt($req->only(['student_id', 'password']))) 
        {
            //=====STORE ID AND PASSWORD TO SESSION=====
            session()->put('std_id', $req['student_id']);
            session()->put('password', $req['password']);

            //=====IF THE EMAIL AND PASSWORD ARE EXISTED=====
            return redirect('home');
            
        } else {
            //=====IF THE EMAIL AND PASSWORD ARE NOT EXISTED=====
            return redirect()->back()->withErrors(['password' => 'Invalid Login'])->withInput();
        }

        // echo $req->student_id;

    }
}
