@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Dashboard | Dinamik')

@section('content')

@include('templates.dashboard-header')

<main class="dashboard">

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
        <span class=" dashboard-section-header">Data Tim</span>

        @if($team->competition_id == null)
        <form action="{{route('dashboard.profile.update.team')}}" method="POST" class="dashboard-form"
            id="data-team-form">
            @csrf
            @endif

            <table>
                <tr class="dashboard-form-row">
                    <td><label for="">Nama Tim</label></td>
                    <td>
                        <input type="text" name="nama_tim" class="dashboard-form-text" placeholder="Ex : Dynamic Team"
                            @if($team->competition_id != null)
                        value="{{$team->nama_tim}}" disabled @endif>
                    </td>
                </tr>
                @error('nama_tim')
                <tr>
                    <td></td>
                    <td>
                        <div class="dashboard-form-error">
                            {{$errors->first('nama_tim')}}
                        </div>
                    </td>
                </tr>
                @enderror
                <tr class="dashboard-form-row">
                    <td><label for="">Asal Sekolah</label></td>
                    <td><input type="text" name="asal_sekolah" class="dashboard-form-text"
                            placeholder="Ex : SMAN X Bandung" required @if($team->competition_id != null)
                        value="{{$team->asal_sekolah}}" disabled @endif>
                    </td>
                </tr>
                @error('asal_sekolah')
                <tr>
                    <td></td>
                    <td>
                        <div class="dashboard-form-error">
                            {{$errors->first('asal_sekolah')}}
                        </div>
                    </td>
                </tr>
                @enderror
                <tr class="dashboard-form-row">
                    <td><label for="">Kategori Lomba</label></td>
                    <td>
                        @if($team->competition_id == null)
                        <div class="select-container">
                            <select name="lomba" id="" class="dashboard-form-select">
                                <option value="">Pilih Kategori Lomba</option>
                                @foreach ($competition as $lomba)
                                <option value="{{$lomba->id}}">{{$lomba->singkatan}}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down dashboard-form-arrow"></i>
                        </div>
                        @else
                        <input type="text" name="lomba" class="dashboard-form-text" placeholder="Ex : SMAN X Bandung"
                            value="{{$team->competition->nama_competition}}" disabled>
                        @endif
                    </td>
                </tr>
                @error('lomba')
                <tr>
                    <td></td>
                    <td>
                        <div class="dashboard-form-error">
                            {{$errors->first('lomba')}}
                        </div>
                    </td>
                </tr>
                @enderror
                @if($team->competition_id == null)
                <tr>
                    <td></td>
                    <td>
                        <button type="button" class="dashboard-form-button" data-toggle="modal"
                            data-target="#modal-team-data">
                            Submit
                        </button>
                    </td>
                </tr>
                @endif
            </table>

            @if($team->competition_id == null)
        </form>
        @endif

    </section>
</main>


@if($team->competition_id == null)
<!-- Modal -->
<div class="modal fade" id="modal-team-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fas fa-exclamation-triangle"></i>
                    Peringatan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Pastikan data Tim yang Anda masukkan sudah benar, karena Anda tidak bisa merubahnya kembali.
            </div>
            <div class="modal-footer">
                <button type="button" class="dashboard-form-button bg-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="dashboard-form-button bg-success" id="modal-submit">Submit</button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection