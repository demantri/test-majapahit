<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Profile::select('profiles.*', 'users.username', 'users.email')
        ->from('profiles')
        ->join('users', 'users.username', '=', 'profiles.user_id')
        ->where('username','!=','admin')
        ->get();
        // dd($data);
        return view('profile.index', compact('data'));
    }

    public function add(Request $request)
    {
        $profile = new Profile;
        $profile->alamat_ktp = $request->alamat;
        $profile->pekerjaan = $request->pekerjaan;
        $profile->nama_lengkap = $request->nama_lengkap;
        $profile->pendidikan_terakhir = $request->pendidikan;
        $profile->no_telp = $request->no_telp;
        $profile->user_id = $request->username;
        $save = $profile->save();

        $user = new User;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->name = $request->nama_lengkap;
        $user->save();

        return redirect('/profile');
    }

    public function update_profile(Request $request)
    {
        $id_profile = $request->id_profile;

        $data = Profile::find($id_profile);
        $data->nama_lengkap = $request->nama_lengkap;
        $data->pendidikan_terakhir = $request->pendidikan;
        $data->alamat_ktp = $request->alamat;
        $data->pekerjaan = $request->pekerjaan;
        $save = $data->save();

        if ($save) {
            # code...
            Session::flash('success', 'Data berhasil diubah.');
            return redirect('/profile');
        } else {
            # code...
            Session::flash('errors', 'Data gagal diubah. Silahkan ulangi kembali.');
            return redirect('/profile');
        }
    }

    public function delete($id)
    {
        Profile::where('id', $id)
        ->delete();

        return redirect('/profile')->with('success', 'Data berhasil dihapus.');
    }
}
