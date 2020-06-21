<?php

namespace App\Http\Controllers;

use App\SemnasParticipant;
use App\Mail\PaymentInstructionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function pca()
    {
        return view('pca');
    }

    public function netcomp()
    {
        return view('netcomp');
    }

    public function cspc()
    {
        return view('cspc');
    }

    public function webdev()
    {
        return view('webdev');
    }

    public function animation()
    {
        return view('animation');
    }

    public function seminar() {
        return view('seminar');
    }

    public function showFormRegisterSeminar() {
        return view('form-seminar');
    }

    public function insertPesertaSeminar(Request $request) {
        $message = [
        'nama.required' => 'Nama Tidak Boleh Kosong',
        'email.required' => 'Email Tidak Boleh Kosong',
        'email.email' => 'Email Tidak Valid',
        'email.unique' => 'Email Sudah Digunakan',
        'phone.required' => 'Nomor Telepon Tidak Boleh Kosong',
        'instansi.required' => 'Instansi Tidak Boleh Kosong',
        ];

        Validator::make($request->all(), [
        'nama' => 'required',
        'email' => 'required|email|unique:semnas_participants',
        'phone' => 'required',
        'instansi' => 'required',
        ], $message)->validate();

        SemnasParticipant::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('phone'),
            'instansi' => $request->input('instansi'),
        ]);

        Mail::to($request->input('email'))->send(new PaymentInstructionMail());

        return redirect()->route('seminar.register.success');
    }

    public function showSuccessRegisterSeminar() {
        return view('semnas-success-screen');
    }

    public function testPDF(){
    }

}
