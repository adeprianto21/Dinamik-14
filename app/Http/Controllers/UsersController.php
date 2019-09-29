<?php

namespace App\Http\Controllers;

use App\Competition;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

        if ($user->team->competition_id == null) {
            return redirect()->route('dashboard.profile')->with('error', 'Harap isi identitas Tim terlebih dahulu');
        } else {
            return view('user.dashboard', ['team' => User::find(Auth::user()->id)->team]);
        }
    }

    public function profile()
    {
        return view('user.profile', ['team' => User::find(Auth::user()->id)->team, 'competition' => Competition::all()]);
    }

    public function updateTeam(Request $request)
    {
        $message = [
            'nama_tim.required' => 'Nama Tim harus diisi',
            'nama_tim.unique' => 'Nama Tim sudah terpakai',
            'asal_sekolah.required'  => 'Asal Sekolah harus diisi',
            'lomba.required' => 'Lomba harus dipilih',
        ];

        Validator::make($request->all(), [
            'nama_tim' => 'required|unique:teams',
            'asal_sekolah' => 'required',
            'lomba' => 'required',
        ], $message)->validate();

        User::find(Auth::user()->id)->team->update([
            'nama_tim' => $request->input('nama_tim'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'competition_id' => $request->input('lomba')
        ]);

        return redirect()->route('dashboard.profile')->with('success', 'Identitas Tim telah ditambahkan');
    }
}
