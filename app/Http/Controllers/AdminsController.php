<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\SeminarPaymentReceipt;
use App\Mail\SwarakaraTicket;
use App\Team;
use App\Payment;
use App\SemnasParticipant;
use PDF;

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

    public function showSeminarParticipants() {
        return view('admin.seminar', ['participants' => SemnasParticipant::all()]);
    }

    public function showSeminarParticipantDetail($id) {
        return view('admin.seminar-participant-detail', ['participant' => SemnasParticipant::find($id)]);
    }

    public function sendTicketSeminar($id) {        
        
        $participant = SemnasParticipant::find($id);

        $pdf = PDF::loadView('templates.pdf.seminar', ['participant' => $participant]);
        $file_name = 'semnas_receipt_'.$participant->id.'_'.$participant->nama.'.pdf';
        file_put_contents('resources/pdf-semnas/'.$file_name, $pdf->output());

        Mail::to($participant->email)->send(new SeminarPaymentReceipt($participant, $file_name));
        return redirect()->back()->with('success', 'Email Bukti Pembayaran Telah Terkirim');
    }

    public function showFormFestivalMusic() {
        return view('admin.form-music-festival');
    }

    public function sendTicketFestivaMusic(Request $request) {

        $message = [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.email' => 'Email Tidak Valid',
            'no_telp.required' => 'Nomor Telepon Tidak Boleh Kosong',
            'jml_ticket.required' => 'Jumlah Ticket Tidak Boleh Kosong',
            'no_ticket.required' => 'Nomor Ticket Tidak Boleh Kosong',
        ];
        
        Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'jml_ticket' => 'required',
            'no_ticket' => 'required',
        ], $message)->validate();
        
        $participant = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
            'jml_ticket' => $request->input('jml_ticket'),
            'no_ticket' => $request->input('no_ticket'),
        ];

        $pdf = PDF::loadView('templates.pdf.music', ['participant' => $participant]);
        $file_name = 'swarakara_e-ticket_'.$participant['no_ticket'].'_'.$participant['nama'].'.pdf';
        file_put_contents('resources/pdf-music/'.$file_name, $pdf->output());

        Mail::to($participant['email'])->send(new SwarakaraTicket($participant, $file_name));
        return redirect()->back()->with('success', 'Email Bukti Pembayaran Telah Terkirim');
    }
}
