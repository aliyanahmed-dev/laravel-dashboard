<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\User;
use Auth;
use Hash;
use DB;
use Carbon\Carbon;
use Mail;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6|max:16',
        ]);
        $check = explode('@', $request->email);

        $contains = Str::contains(str::lower($request->password), str::lower($check[0]), str::lower($request->name));

        if ($contains) {
            return back()->withErrors(['Do not user name and email in password']);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect(app()->getLocale() . '/login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('profile')->with('notify_success', 'You have Successfully loggedin');
        }
        return back()->with('error', 'Oppes! You have entered invalid credentials');
    }

    function changepassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:6'
        ]);
        $auth = Auth::user();

        if (!Hash::check($request->get('current_password'), $auth->password)) {
            return back()->with('password_error', "Current Password is Invalid");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->password);
        $user->save();
        return back()->with('password_sucess', "Password Changed Successfully");
    }

    public function logout()
    {
        return redirect(app()->getLocale() . '/login')->with(Auth::logout());
    }


    public function adminLogin(Request $request)
    {
        $admin = User::where('email', $request->email)->first();

        if ($admin && password_verify($request->password, $admin->password)) {
            if ($admin->is_admin == 1) {
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    return redirect()->intended('admin/')
                        ->withSuccess('You have Successfully loggedin');
                }
            } else {
                return back()->withErrors(['You are not authorize for admin login']);
            }
        } else {
            return back()->withErrors(['Invalid Username or Password']);
        }
    }

    public function adminlogout()
    {
        return redirect('/admin/signin')->with(Auth::logout());
    }







    // Forget Password
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('admin.pages.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('admin.pages.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('admin/signin')->with('message', 'Your password has been changed!');
    }
}
