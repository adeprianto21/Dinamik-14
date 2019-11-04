<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Payment;

class AdminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard', ['teams' => Team::where('nama_tim', '!=', null)->get()]);
    }

    public function showTeams() {
        return view('admin.teams', ['teams' => Team::where('nama_tim', '!=', null)->get()]);
    }

    public function showTeamDetail($id) {
        return view('admin.team_detail', ['team' => Team::find($id)]);
    }

    public function showTeamKarya() {
        return view('admin.karya', ['teams' => Team::where('nama_tim', '!=', null)->get()]);
    }

    public function showTeamKaryaDetail($id) {
        return view('admin.karya_detail', ['team' => Team::find($id)]);
    }

    public function showPayments() {
        return view('admin.payments', ['teams' => Team::where('nama_tim', '!=', null)->get(), 'payments' => Payment::get()]);
    }

    public function showPaymentDetail($id) {
        return view('admin.payment_detail', ['team' => Team::find($id)]);
    }

    public function updatePaymentStatus($id, $status) {
        $team_payment = Team::find($id)->payment;
        $team_payment->status_validasi = 1;
        $team_payment->status_pembayaran = $status;
        $team_payment->save();
        return redirect()->route('admin.payment.detail', ['id' => $id]);
    }
}
