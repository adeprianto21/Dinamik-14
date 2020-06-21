@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Fest Music | Admin | Dinamik')

@section('content')

@include('templates.dashboard-admin-header')

<main class="dashboard">

    @if(session()->has('status'))
    <div class="alert alert-success">
        {{ session()->get('status') }}
    </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif

    <section class="dashboard-section">
        <span class=" dashboard-section-header">Fest Music E-Ticket</span>
        <form action="{{route('admin.music.send')}}" method="POST">
            @csrf
            <div class="dashboard-overflow">
                <table>
                    <tr class="dashboard-form-row">
                        <td class="min">
                            <label for="nama" class="dashboard-form-label">
                                Nama Pembeli
                            </label>
                        </td>
                        <td>
                            <input type="text" name="nama" class="dashboard-form-text" placeholder="Nama Pembeli"
                                required>
                        </td>
                    </tr>
                    @error('nama')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('nama')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                    <tr class="dashboard-form-row">
                        <td class="min">
                            <label for="email" class="dashboard-form-label">
                                Email
                            </label>
                        </td>
                        <td>
                            <input type="email" name="email" class="dashboard-form-text" placeholder="Email" required>
                        </td>
                    </tr>
                    @error('email')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('email')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                    <tr class="dashboard-form-row">
                        <td class="min">
                            <label for="no_telp" class="dashboard-form-label">
                                No Telp
                            </label>
                        </td>
                        <td>
                            <input type="text" name="no_telp" class="dashboard-form-text" placeholder="No Telp"
                                required>
                        </td>
                    </tr>
                    @error('no_telp')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('no_telp')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                    <tr class="dashboard-form-row">
                        <td class="min">
                            <label for="jml_ticket" class="dashboard-form-label">
                                Jumlah Tiket
                            </label>
                        </td>
                        <td>
                            <input type="number" name="jml_ticket" class="dashboard-form-text"
                                placeholder="Jumlah Ticket" required>
                        </td>
                    </tr>
                    @error('jml_ticket')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('jml_ticket')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                    <tr class="dashboard-form-row">
                        <td class="min">
                            <label for="no_ticket" class="dashboard-form-label">
                                Nomor Ticket
                            </label>
                        </td>
                        <td>
                            <input type="text" name="no_ticket" class="dashboard-form-text" placeholder="Nomor Ticket"
                                required>
                        </td>
                    </tr>
                    @error('no_ticket')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('no_ticket')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                </table>
            </div>
            <button type="submit" class="dashboard-form-button">
                Kirim E-Ticket
            </button>
        </form>
    </section>
</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection