<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;

class AuthController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            //Login Success
            return redirect()->route('home');
        }
        return view('auth.form_login');
    }

    public function doLogin(Request $request)
    {
        # code...
        $rules = [
            'username'  => 'required',
            'password'  => 'required'
        ];

        $messages = [
            'username.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
        ];

        // dd($data);

        Auth::attempt($data);

        if (Auth::check()) {
            // Berhasil
            return redirect()->route('home');
        } else {
            // Gagal
            Session::flash('error', 'Email atau password salah');
            return redirect('/');
        }
    }

    public function register_form()
    {
        # code...
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $rules = [
            // 'nama' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ];

        $messages = [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah terdaftar sebelumnya',

            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar sebelumnya',
            // 'nama.required' => 'Nama harus diisi',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Tidak sama dengan password sebelumnya',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $login = New User;
        // $login->username = ucwords(strtolower($request->username));
        $login->email = $request->email;
        $login->username = $request->username;
        $login->password = Hash::make($request->password);
        $login->name = $request->username;
        $save = $login->save();
        // dd($save);

        $profile = new Profile;
        $profile->user_id = $request->username;
        $profile->save();

        if ($save) {
            # code...
            Session::flash('success', 'Berhasil mendaftar. Silahkan login untuk mengakses data');
            return redirect('/');
            // return redirect('/login');
        } else {
            # code...
            Session::flash('errors', [
                '' => 'Register gagal! Silahkan ulangi beberapa saat lagi'
            ]);
            return redirect()->route('register');
            // return redirect('/register');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
