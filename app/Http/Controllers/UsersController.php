<?php

namespace App\Http\Controllers;

use App\Competition;
use App\User;
use App\Participant;
use App\Instructor;
use App\Payment;
use App\Creation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{

    protected $folder_foto_peserta;
    protected $folder_foto_payment;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->folder_foto_peserta = 'resources/img/Participant_Image/';
        $this->folder_foto_payment = 'resources/img/Payment_Image/';
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
            return redirect()->route('dashboard.profile')->with('error', 'Harap Isi Identitas Tim Terlebih Dahulu');
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
            'nama_tim.required' => 'Nama Tim Harus Diisi',
            'nama_tim.unique' => 'Nama Tim Sudah Terpakai',
            'asal_sekolah.required'  => 'Asal Sekolah Harus Diisi',
            'lomba.required' => 'Lomba Harus Dipilih',
            'jumlah_anggota.required' => 'Jumlah Anggota Harus Diisi',
        ];

        Validator::make($request->all(), [
            'nama_tim' => 'required|unique:teams',
            'asal_sekolah' => 'required',
            'lomba' => 'required',
            'jumlah_anggota' => 'required',
        ], $message)->validate();

        User::find(Auth::user()->id)->team->update([
            'nama_tim' => $request->input('nama_tim'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'jumlah_anggota' => $request->input('jumlah_anggota'),
            'competition_id' => $request->input('lomba'),
        ]);

        return redirect()->route('dashboard.profile')->with('success', 'Identitas Tim Telah Ditambahkan');
    }

    public function insertParticipant(Request $request)
    {

        $user = User::find(Auth::user()->id);

        if ($user->team->competition_id == null) {
            return redirect()->route('dashboard.profile')->with('error', 'Harap Isi Identitas Tim Terlebih Dahulu');
        } else {
            if (User::find(Auth::user()->id)->team->jumlah_anggota == 1) {

                $message = [
                    // ========================= Pembimbing ===========================
                    'nama_pembimbing.required' => 'Nama Pembimbing Harus Diisi',
                    'nip_pembimbing.required'  => 'NIP Pembimbing Harus Diisi',
                    'no_telp_pembimbing.required' => 'No Telepon Pembimbing Harus Diisi',
                    'no_wa_pembimbing.required' => 'No WA Pembimbing Harus Diisi',
                    // ========================== Peserta 1 ===========================
                    'nama_peserta_1.required' => 'Nama Peserta Harus Diisi',
                    'nisn_peserta_1.required'  => 'NISN Peserta Harus Diisi',
                    'no_telp_peserta_1.required' => 'No Telepon Peserta Harus Diisi',
                    'no_wa_peserta_1.required' => 'No WA Peserta Harus Diisi',
                    'foto_peserta_1.required' => 'Pas Foto Tidak Boleh Kosong',
                    'ktp_peserta_1.required' => 'Kartu Pelajar Tidak Boleh Kosong',
                    'foto_peserta_1.max' => 'File Melebihi Dari 2 MB',
                    'foto_peserta_1.mimes' => 'Format File Harus JPG, JPEG, PNG',
                    'ktp_peserta_1.max' => 'File Melebihi Dari 2 MB',
                    'ktp_peserta_1.mimes' => 'Format File Harus JPG, JPEG, PNG',
                ];

                Validator::make($request->all(), [
                    // ========================= Pembimbing ===========================
                    'nama_pembimbing' => 'required',
                    'nip_pembimbing' => 'required',
                    'no_telp_pembimbing' => 'required',
                    'no_wa_pembimbing' => 'required',
                    // ========================== Peserta 1 ===========================
                    'nama_peserta_1' => 'required',
                    'nisn_peserta_1' => 'required',
                    'no_telp_peserta_1' => 'required',
                    'no_wa_peserta_1' => 'required',
                    'foto_peserta_1' => 'required|max:2048|mimes:jpg,jpeg,png',
                    'ktp_peserta_1' => 'required|max:2048|mimes:jpg,jpeg,png',
                ], $message)->validate();

                Instructor::create([
                    'nama' => $request->input('nama_pembimbing'),
                    'nip' => $request->input('nip_pembimbing'),
                    'no_telp' => $request->input('no_telp_pembimbing'),
                    'no_wa' => $request->input('no_wa_pembimbing'),
                    'team_id' => User::find(Auth::user()->id)->team->id,
                ]);

                Participant::create([
                    'nama' => $request->input('nama_peserta_1'),
                    'nisn' => $request->input('nisn_peserta_1'),
                    'no_telp' => $request->input('no_telp_peserta_1'),
                    'no_wa' => $request->input('no_wa_peserta_1'),
                    'nama_file_foto' => date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_1') . '.' . $request->file('foto_peserta_1')->getClientOriginalExtension(),
                    'nama_file_kartu' => date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_1') . '.' . $request->file('ktp_peserta_1')->getClientOriginalExtension(),
                    'team_id' => User::find(Auth::user()->id)->team->id,
                ]);

                $request->file('foto_peserta_1')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_1') . '.' . $request->file('foto_peserta_1')->getClientOriginalExtension());
                $request->file('ktp_peserta_1')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_1') . '.' . $request->file('ktp_peserta_1')->getClientOriginalExtension());

                return redirect()->route('dashboard.profile')->with('success', 'Identitas Pembimbing & Peserta Telah Ditambahkan');
            } else if (User::find(Auth::user()->id)->team->jumlah_anggota == 2) {

                $message = [
                    // ========================= Pembimbing ===========================
                    'nama_pembimbing.required' => 'Nama Pembimbing Harus Diisi',
                    'nip_pembimbing.required'  => 'NIP Pembimbing Harus Diisi',
                    'no_telp_pembimbing.required' => 'No Telepon Pembimbing Harus Diisi',
                    'no_wa_pembimbing.required' => 'No WA Pembimbing Harus Diisi',
                    // ========================== Peserta 1 ===========================
                    'nama_peserta_1.required' => 'Nama Peserta Harus Diisi',
                    'nisn_peserta_1.required'  => 'NISN Peserta Harus Diisi',
                    'no_telp_peserta_1.required' => 'No Telepon Peserta Harus Diisi',
                    'no_wa_peserta_1.required' => 'No WA Peserta Harus Diisi',
                    'foto_peserta_1.required' => 'Pas Foto Tidak Boleh Kosong',
                    'ktp_peserta_1.required' => 'Kartu Pelajar Tidak Boleh Kosong',
                    'foto_peserta_1.max' => 'File Melebihi Dari 2 MB',
                    'foto_peserta_1.mimes' => 'Format File Harus JPG, JPEG, PNG',
                    'ktp_peserta_1.max' => 'File Melebihi Dari 2 MB',
                    'ktp_peserta_1.mimes' => 'Format File Harus JPG, JPEG, PNG',
                    // ========================== Peserta 2 ===========================
                    'nama_peserta_2.required' => 'Nama Peserta Harus Diisi',
                    'nisn_peserta_2.required'  => 'NISN Peserta Harus Diisi',
                    'no_telp_peserta_2.required' => 'No Telepon Peserta Harus Diisi',
                    'no_wa_peserta_2.required' => 'No WA Peserta Harus Diisi',
                    'foto_peserta_2.required' => 'Pas Foto Tidak Boleh Kosong',
                    'ktp_peserta_2.required' => 'Kartu Pelajar Tidak Boleh Kosong',
                    'foto_peserta_2.max' => 'File Melebihi Dari 2 MB',
                    'foto_peserta_2.mimes' => 'Format File Harus JPG, JPEG, PNG',
                    'ktp_peserta_2.max' => 'File Melebihi Dari 2 MB',
                    'ktp_peserta_2.mimes' => 'Format File Harus JPG, JPEG, PNG',
                ];

                Validator::make($request->all(), [
                    // ========================= Pembimbing ===========================
                    'nama_pembimbing' => 'required',
                    'nip_pembimbing' => 'required',
                    'no_telp_pembimbing' => 'required',
                    'no_wa_pembimbing' => 'required',
                    // ========================== Peserta 1 ===========================
                    'nama_peserta_1' => 'required',
                    'nisn_peserta_1' => 'required',
                    'no_telp_peserta_1' => 'required',
                    'no_wa_peserta_1' => 'required',
                    'foto_peserta_1' => 'required|max:2048|mimes:jpg,jpeg,png',
                    'ktp_peserta_1' => 'required|max:2048|mimes:jpg,jpeg,png',
                    // ========================== Peserta 2 ===========================
                    'nama_peserta_2' => 'required',
                    'nisn_peserta_2' => 'required',
                    'no_telp_peserta_2' => 'required',
                    'no_wa_peserta_2' => 'required',
                    'foto_peserta_2' => 'required|max:2048|mimes:jpg,jpeg,png',
                    'ktp_peserta_2' => 'required|max:2048|mimes:jpg,jpeg,png',
                ], $message)->validate();

                Instructor::create([
                    'nama' => $request->input('nama_pembimbing'),
                    'nip' => $request->input('nip_pembimbing'),
                    'no_telp' => $request->input('no_telp_pembimbing'),
                    'no_wa' => $request->input('no_wa_pembimbing'),
                    'team_id' => User::find(Auth::user()->id)->team->id,
                ]);

                Participant::create([
                    'nama' => $request->input('nama_peserta_1'),
                    'nisn' => $request->input('nisn_peserta_1'),
                    'no_telp' => $request->input('no_telp_peserta_1'),
                    'no_wa' => $request->input('no_wa_peserta_1'),
                    'nama_file_foto' => date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_1') . '.' . $request->file('foto_peserta_1')->getClientOriginalExtension(),
                    'nama_file_kartu' => date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_1') . '.' . $request->file('ktp_peserta_1')->getClientOriginalExtension(),
                    'team_id' => User::find(Auth::user()->id)->team->id,
                ]);

                Participant::create([
                    'nama' => $request->input('nama_peserta_2'),
                    'nisn' => $request->input('nisn_peserta_2'),
                    'no_telp' => $request->input('no_telp_peserta_2'),
                    'no_wa' => $request->input('no_wa_peserta_2'),
                    'nama_file_foto' => date('Y-m-d') . "_" . $request->input('nisn_peserta_2') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_2') . '.' . $request->file('foto_peserta_2')->getClientOriginalExtension(),
                    'nama_file_kartu' => date('Y-m-d') . "_" . $request->input('nisn_peserta_2') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_2') . '.' . $request->file('ktp_peserta_2')->getClientOriginalExtension(),
                    'team_id' => User::find(Auth::user()->id)->team->id,
                ]);

                $request->file('foto_peserta_1')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_1') . '.' . $request->file('foto_peserta_1')->getClientOriginalExtension());
                $request->file('ktp_peserta_1')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_1') . '.' . $request->file('ktp_peserta_1')->getClientOriginalExtension());
                $request->file('foto_peserta_2')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_2') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_2') . '.' . $request->file('foto_peserta_2')->getClientOriginalExtension());
                $request->file('ktp_peserta_2')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_2') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_2') . '.' . $request->file('ktp_peserta_2')->getClientOriginalExtension());

                return redirect()->route('dashboard.profile')->with('success', 'Identitas Pembimbing & Peserta Telah Ditambahkan');
            } else {

                $message = [
                    // ========================= Pembimbing ===========================
                    'nama_pembimbing.required' => 'Nama Pembimbing Harus Diisi',
                    'nip_pembimbing.required'  => 'NIP Pembimbing Harus Diisi',
                    'no_telp_pembimbing.required' => 'No Telepon Pembimbing Harus Diisi',
                    'no_wa_pembimbing.required' => 'No WA Pembimbing Harus Diisi',
                    // ========================== Peserta 1 ===========================
                    'nama_peserta_1.required' => 'Nama Peserta Harus Diisi',
                    'nisn_peserta_1.required'  => 'NISN Peserta Harus Diisi',
                    'no_telp_peserta_1.required' => 'No Telepon Peserta Harus Diisi',
                    'no_wa_peserta_1.required' => 'No WA Peserta Harus Diisi',
                    'foto_peserta_1.required' => 'Pas Foto Tidak Boleh Kosong',
                    'ktp_peserta_1.required' => 'Kartu Pelajar Tidak Boleh Kosong',
                    'foto_peserta_1.max' => 'File Melebihi Dari 2 MB',
                    'foto_peserta_1.mimes' => 'Format File Harus JPG, JPEG, PNG',
                    'ktp_peserta_1.max' => 'File Melebihi Dari 2 MB',
                    'ktp_peserta_1.mimes' => 'Format File Harus JPG, JPEG, PNG',
                    // ========================== Peserta 2 ===========================
                    'nama_peserta_2.required' => 'Nama Peserta Harus Diisi',
                    'nisn_peserta_2.required'  => 'NISN Peserta Harus Diisi',
                    'no_telp_peserta_2.required' => 'No Telepon Peserta Harus Diisi',
                    'no_wa_peserta_2.required' => 'No WA Peserta Harus Diisi',
                    'foto_peserta_2.required' => 'Pas Foto Tidak Boleh Kosong',
                    'ktp_peserta_2.required' => 'Kartu Pelajar Tidak Boleh Kosong',
                    'foto_peserta_2.max' => 'File Melebihi Dari 2 MB',
                    'foto_peserta_2.mimes' => 'Format File Harus JPG, JPEG, PNG',
                    'ktp_peserta_2.max' => 'File Melebihi Dari 2 MB',
                    'ktp_peserta_2.mimes' => 'Format File Harus JPG, JPEG, PNG',
                    // ========================== Peserta 3 ===========================
                    'nama_peserta_3.required' => 'Nama Peserta Harus Diisi',
                    'nisn_peserta_3.required'  => 'NISN Peserta Harus Diisi',
                    'no_telp_peserta_3.required' => 'No Telepon Peserta Harus Diisi',
                    'no_wa_peserta_3.required' => 'No WA Peserta Harus Diisi',
                    'foto_peserta_3.required' => 'Pas Foto Tidak Boleh Kosong',
                    'ktp_peserta_3.required' => 'Kartu Pelajar Tidak Boleh Kosong',
                    'foto_peserta_3.max' => 'File Melebihi Dari 2 MB',
                    'foto_peserta_3.mimes' => 'Format File Harus JPG, JPEG, PNG',
                    'ktp_peserta_3.max' => 'File Melebihi Dari 2 MB',
                    'ktp_peserta_3.mimes' => 'Format File Harus JPG, JPEG, PNG',
                ];

                Validator::make($request->all(), [
                    // ========================= Pembimbing ===========================
                    'nama_pembimbing' => 'required',
                    'nip_pembimbing' => 'required',
                    'no_telp_pembimbing' => 'required',
                    'no_wa_pembimbing' => 'required',
                    // ========================== Peserta 1 ===========================
                    'nama_peserta_1' => 'required',
                    'nisn_peserta_1' => 'required',
                    'no_telp_peserta_1' => 'required',
                    'no_wa_peserta_1' => 'required',
                    'foto_peserta_1' => 'required|max:2048|mimes:jpg,jpeg,png',
                    'ktp_peserta_1' => 'required|max:2048|mimes:jpg,jpeg,png',
                    // ========================== Peserta 2 ===========================
                    'nama_peserta_2' => 'required',
                    'nisn_peserta_2' => 'required',
                    'no_telp_peserta_2' => 'required',
                    'no_wa_peserta_2' => 'required',
                    'foto_peserta_2' => 'required|max:2048|mimes:jpg,jpeg,png',
                    'ktp_peserta_2' => 'required|max:2048|mimes:jpg,jpeg,png',
                    // ========================== Peserta 3 ===========================
                    'nama_peserta_3' => 'required',
                    'nisn_peserta_3' => 'required',
                    'no_telp_peserta_3' => 'required',
                    'no_wa_peserta_3' => 'required',
                    'foto_peserta_3' => 'required|max:2048|mimes:jpg,jpeg,png',
                    'ktp_peserta_3' => 'required|max:2048|mimes:jpg,jpeg,png',
                ], $message)->validate();

                Instructor::create([
                    'nama' => $request->input('nama_pembimbing'),
                    'nip' => $request->input('nip_pembimbing'),
                    'no_telp' => $request->input('no_telp_pembimbing'),
                    'no_wa' => $request->input('no_wa_pembimbing'),
                    'team_id' => User::find(Auth::user()->id)->team->id,
                ]);

                Participant::create([
                    'nama' => $request->input('nama_peserta_1'),
                    'nisn' => $request->input('nisn_peserta_1'),
                    'no_telp' => $request->input('no_telp_peserta_1'),
                    'no_wa' => $request->input('no_wa_peserta_1'),
                    'nama_file_foto' => date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_1') . '.' . $request->file('foto_peserta_1')->getClientOriginalExtension(),
                    'nama_file_kartu' => date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_1') . '.' . $request->file('ktp_peserta_1')->getClientOriginalExtension(),
                    'team_id' => User::find(Auth::user()->id)->team->id,
                ]);

                Participant::create([
                    'nama' => $request->input('nama_peserta_2'),
                    'nisn' => $request->input('nisn_peserta_2'),
                    'no_telp' => $request->input('no_telp_peserta_2'),
                    'no_wa' => $request->input('no_wa_peserta_2'),
                    'nama_file_foto' => date('Y-m-d') . "_" . $request->input('nisn_peserta_2') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_2') . '.' . $request->file('foto_peserta_2')->getClientOriginalExtension(),
                    'nama_file_kartu' => date('Y-m-d') . "_" . $request->input('nisn_peserta_2') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_2') . '.' . $request->file('ktp_peserta_2')->getClientOriginalExtension(),
                    'team_id' => User::find(Auth::user()->id)->team->id,
                ]);

                Participant::create([
                    'nama' => $request->input('nama_peserta_3'),
                    'nisn' => $request->input('nisn_peserta_3'),
                    'no_telp' => $request->input('no_telp_peserta_3'),
                    'no_wa' => $request->input('no_wa_peserta_3'),
                    'nama_file_foto' => date('Y-m-d') . "_" . $request->input('nisn_peserta_3') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_3') . '.' . $request->file('foto_peserta_3')->getClientOriginalExtension(),
                    'nama_file_kartu' => date('Y-m-d') . "_" . $request->input('nisn_peserta_3') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_3') . '.' . $request->file('ktp_peserta_3')->getClientOriginalExtension(),
                    'team_id' => User::find(Auth::user()->id)->team->id,
                ]);

                $request->file('foto_peserta_1')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_1') . '.' . $request->file('foto_peserta_1')->getClientOriginalExtension());
                $request->file('ktp_peserta_1')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_1') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_1') . '.' . $request->file('ktp_peserta_1')->getClientOriginalExtension());
                $request->file('foto_peserta_2')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_2') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_2') . '.' . $request->file('foto_peserta_2')->getClientOriginalExtension());
                $request->file('ktp_peserta_2')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_2') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_2') . '.' . $request->file('ktp_peserta_2')->getClientOriginalExtension());
                $request->file('foto_peserta_3')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_3') .  "_" .  User::find(Auth::user()->id)->team->id . '_pasfoto_' . $request->input('nama_peserta_3') . '.' . $request->file('foto_peserta_3')->getClientOriginalExtension());
                $request->file('ktp_peserta_3')->move($this->folder_foto_peserta, date('Y-m-d') . "_" . $request->input('nisn_peserta_3') .  "_" .  User::find(Auth::user()->id)->team->id . '_ktp_' . $request->input('nama_peserta_3') . '.' . $request->file('ktp_peserta_3')->getClientOriginalExtension());

                return redirect()->route('dashboard.profile')->with('success', 'Identitas Pembimbing & Peserta Telah Ditambahkan');
            }
        }
    }

    public function karya()
    {
        $user = User::find(Auth::user()->id);

        if ($user->team->competition_id == null) {
            return redirect()->route('dashboard.profile')->with('error', 'Harap Isi Identitas Tim Terlebih Dahulu');
        } else if ($user->team->competition_id == 4 || $user->team->competition_id == 5) {
            return view('user.karya', ['team' => User::find(Auth::user()->id)->team]);
        } else {
            return redirect()->back()->with('error', 'Tidak Ada Karya Yang Harus Anda Kumpulkan');
        }
    }

    public function insertKarya(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user->team->competition_id == null) {
            return redirect()->route('dashboard.profile')->with('error', 'Harap Isi Identitas Tim Terlebih Dahulu');
        } else if ($user->team->competition_id == 4 || $user->team->competition_id == 5) {
            $message = [
                'link_1.required' => 'Alamat Link Tidak Boleh Kosong',
                'link_2.required' => 'Alamat Link Tidak Boleh Kosong',
            ];

            Validator::make($request->all(), [
                'link_1' => 'required',
                'link_2' => 'required',
            ], $message)->validate();

            Creation::create([
                'link_1' => $request->input('link_1'),
                'link_2' => $request->input('link_2'),
                'team_id' => User::find(Auth::user()->id)->team->id,
            ]);

            return redirect()->route('dashboard.karya')->with('success', 'Alamat Link Karya Berhasil Diupload');
        } else {
            return redirect()->back()->with('error', 'Tidak Ada Karya Yang Harus Anda Kumpulkan');
        }
    }

    public function editKarya()
    {
        $user = User::find(Auth::user()->id);

        if ($user->team->creation == null) {
            return redirect()->route('dashboard.karya')->with('error', 'Harap Upload Link Karya Terlebih Dahulu');
        } else if ($user->team->competition_id == 4 || $user->team->competition_id == 5) {
            return view('user.edit_karya', ['team' => User::find(Auth::user()->id)->team]);
        } else {
            return redirect()->back()->with('error', 'Tidak Ada Karya Yang Harus Anda Kumpulkan');
        }
    }

    public function updateKarya(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user->team->creation == null) {
            return redirect()->route('dashboard.karya')->with('error', 'Harap Upload Link Karya Terlebih Dahulu');
        } else if ($user->team->competition_id == 4 || $user->team->competition_id == 5) {
            $message = [
                'link_1.required' => 'Alamat Link Tidak Boleh Kosong',
                'link_2.required' => 'Alamat Link Tidak Boleh Kosong',
            ];

            Validator::make($request->all(), [
                'link_1' => 'required',
                'link_2' => 'required',
            ], $message)->validate();

            $user->team->creation->update([
                'link_1' => $request->input('link_1'),
                'link_2' => $request->input('link_2'),
            ]);

            return redirect()->route('dashboard.karya')->with('success', 'Alamat Link Karya Berhasil Diubah');
        } else {
            return redirect()->back()->with('error', 'Tidak Ada Karya Yang Harus Anda Kumpulkan');
        }
    }

    public function payment()
    {
        $user = User::find(Auth::user()->id);

        if ($user->team->competition_id == null) {
            return redirect()->route('dashboard.profile')->with('error', 'Harap Isi Identitas Tim Terlebih Dahulu');
        } else {
            return view('user.payment', ['team' => User::find(Auth::user()->id)->team]);
        }
    }

    public function insertPayment(Request $request)
    {

        $user = User::find(Auth::user()->id);

        if ($user->team->competition_id == null) {
            return redirect()->route('dashboard.profile')->with('error', 'Harap Isi Identitas Tim Terlebih Dahulu');
        } else {
            $message = [
                'nama_pemilik_rekening.required' => 'Nama Pembimbing Harus Diisi',
                'foto_payment.required' => 'Foto Tidak Boleh Kosong',
                'foto_payment.max' => 'File Melebihi Dari 2 MB',
                'foto_payment.mimes' => 'Format File Harus JPG, JPEG, PNG',
            ];

            Validator::make($request->all(), [
                'nama_pemilik_rekening' => 'required',
                'foto_payment' => 'required|max:2048|mimes:jpg,jpeg,png',
            ], $message)->validate();

            User::find(Auth::user()->id)->team->payment->update([
                'nama_file' => date('Y-m-d') . "_"  .  User::find(Auth::user()->id)->team->id . '_payment_' . User::find(Auth::user()->id)->team->nama_tim . '.' . $request->file('foto_payment')->getClientOriginalExtension(),
                'nama_pengirim' => $request->input('nama_pemilik_rekening'),
                'status_upload_bukti' => true,
            ]);

            $request->file('foto_payment')->move($this->folder_foto_payment, date('Y-m-d') . "_"  .  User::find(Auth::user()->id)->team->id . '_payment_' . User::find(Auth::user()->id)->team->nama_tim . '.' . $request->file('foto_payment')->getClientOriginalExtension());

            return redirect()->route('dashboard.payment')->with('success', 'Bukti Pembayaran Berhasil Diupload');
        }
    }

    public function editPayment()
    {
        $user = User::find(Auth::user()->id);

        if ($user->team->payment->status_upload_bukti == 0) {
            return redirect()->route('dashboard.payment')->with('error', 'Harap Upload Bukti Pembayaran Terlebih Dahulu');
        } else {
            return view('user.edit_payment', ['team' => User::find(Auth::user()->id)->team]);
        }
    }

    public function updatePayment(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user->team->payment->status_upload_bukti == 0) {
            return redirect()->route('dashboard.payment')->with('error', 'Harap Upload Bukti Pembayaran Terlebih Dahulu');
        } else {
            $message = [
                'nama_pemilik_rekening.required' => 'Nama Pembimbing Harus Diisi',
                'foto_payment.max' => 'File Melebihi Dari 2 MB',
                'foto_payment.mimes' => 'Format File Harus JPG, JPEG, PNG',
            ];

            Validator::make($request->all(), [
                'nama_pemilik_rekening' => 'required',
                'foto_payment' => 'max:2048|mimes:jpg,jpeg,png',
            ], $message)->validate();

            if ($request->file('foto_payment') != null) {
                File::delete(base_path() . '/resources/img/Payment_Image/' . $user->team->payment->nama_file);

                User::find(Auth::user()->id)->team->payment->update([
                    'nama_file' => date('Y-m-d') . "_"  .  User::find(Auth::user()->id)->team->id . '_payment_' . User::find(Auth::user()->id)->team->nama_tim . '.' . $request->file('foto_payment')->getClientOriginalExtension(),
                    'nama_pengirim' => $request->input('nama_pemilik_rekening'),
                ]);

                $request->file('foto_payment')->move($this->folder_foto_payment, date('Y-m-d') . "_"  .  User::find(Auth::user()->id)->team->id . '_payment_' . User::find(Auth::user()->id)->team->nama_tim . '.' . $request->file('foto_payment')->getClientOriginalExtension());
            } else {
                User::find(Auth::user()->id)->team->payment->update([
                    'nama_pengirim' => $request->input('nama_pemilik_rekening'),
                ]);
            }

            return redirect()->route('dashboard.payment')->with('success', 'Bukti Pembayaran Berhasil Diubah');
        }
    }
}
