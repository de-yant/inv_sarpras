<?php

namespace App\Http\Controllers;
use Hash;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('auth/register', [
            'title' => 'Daftar'
        ]);
    }

    public function registerProcess(Request $request)
    {
        $user_kode = 'ADM';
        if (User::count() > 0) {
            $user = User::orderBy('user_id', 'desc')->first();
            $user_id = intval(substr($user->user_id, 3))+1;
            $user_id = $user_kode.str_pad($user_id, 4, '0', STR_PAD_LEFT);
        } else {
            $user_id = $user_kode.'0001';
        }


        $validateData = $request->validate([
            'name' => 'required|min:3|max:60',
            'email' => 'required|email|unique:users|email:dns',
            'password' => 'required|min:8|max:60',
            'password_confirmation' => 'required|same:password'
        ], messages:[
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 60 karakter',
            'email.required' => 'Email harus diisi',
            'email.email:dns' => 'Email tidak valid',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 60 karakter',
            'password_confirmation.required' => 'Konfirmasi password harus diisi',
            'password_confirmation.same' => 'Konfirmasi password tidak sama dengan password'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        $user = User::create([
            'user_id' => $user_id,
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => $validateData['password'],
        ]);
        return redirect('login')->with('success', 'Pendaftaran Berhasil Silahkan Login');
    }

    public function login(Request $request)
    {
        return view('auth/login', [
            'title' => 'Masuk'
        ]);
    }

    public function loginProcess(Request $request)
    {
        $validateData = $request->validate(rules: [
            'email' => 'required|email:dns|exists:users',
            'password' => 'required|min:8|'
        ], messages: [
            'email.required' => 'Email harus diisi',
            'email.email:dns' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter'
        ]);

        if (!auth()->attempt($validateData)) {
            return redirect('login')->with('fail', 'Email atau Password salah!');
        }

    return redirect('dashboard')->with('success', 'Berhasil Masuk!');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('login')->with('success', 'Berhasil Keluar');
    }

    public function index()
    {
        $profile = User::where('id', auth()->user()->id)->first();
        return view('auth.index', [
            'title' => 'Profil',
            'profile' => $profile
        ]);
    }

    function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function update(Request $request, $id)
    {
        $profile = User::where('id', auth()->user()->id)->first();

        $validateData = $request->validate([
            'name' => 'required|min:3|max:60',
            'email' => 'required|email:dns|unique:users,email,'.$profile->id,
            'foto_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|min:8|max:60',
            'password_confirmation' => 'required|same:password',
        ], messages:[
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 60 karakter',
            'email.required' => 'Email harus diisi',
            'email.email:dns' => 'Email tidak valid',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 60 karakter',
            'password_confirmation.same' => 'Konfirmasi password tidak sama dengan password',
        ]);


        if ($request->hasFile('foto_profile')){
            $file_name = $this->generateRandomString();
            $extension = $request->file('foto_profile')->getClientOriginalExtension();
            $foto_profile_name = $file_name . '.' . $extension;

            $foto_profile = Storage::putFileAs('public/img/profile', $request->file('foto_profile'), $foto_profile_name);
        }

        $profile->update([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'foto_profile' => $foto_profile_name,
            'password' => bcrypt($validateData['password']),
        ]);
        return redirect()->route('profile')->with('info', 'Data berhasil diubah');
    }

    public function forgotPassword(Request $request)
    {
        return view('auth.forgot-password', [
            'title' => 'Lupa Password'
        ]);
    }
}
