@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Karya | Admin | Dinamik')

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
        <span class="header-competition text-center">{{$team->nama_tim}}</span>
        <span class="header-competition-subtitle text-center">({{$team->asal_sekolah}})</span>
        <span class="header-competition-subtitle text-center">{{$team->competition->nama_competition}}</span>
    </section>

    @if ($team->creation != null)
    <section class="dashboard-section">
        <span class=" dashboard-section-header">Link Karya</span>
        <div class="dashboard-overflow">
            <table>
                <tr class="dashboard-form-row">
                    <td class="min">
                        <label for="" class="dashboard-form-label">
                            @if ($team->competition_id == 4)
                            Link Proposal
                            @else
                            Link Teaser Animasi
                            @endif
                        </label>
                    </td>
                    <td>
                        <a href="{{$team->creation->link_1}}" class="link-creation"
                            target="_blank">{{$team->creation->link_1}}</a>
                    </td>
                </tr>
                <tr class="dashboard-form-row">
                    <td class="min">
                        <label for="" class="dashboard-form-label">
                            @if ($team->competition_id == 4)
                            Link Source Code Web
                            @else
                            Link Animasi (Full)
                            @endif
                        </label>
                    </td>
                    <td>
                        <a href="{{$team->creation->link_2}}" class="link-creation"
                            target="_blank">{{$team->creation->link_2}}</a>
                    </td>
                </tr>
            </table>
        </div>
    </section>
    @else
    <div class="alert alert-danger">
        Tim Belum Submit Karya
    </div>
    @endif
</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection