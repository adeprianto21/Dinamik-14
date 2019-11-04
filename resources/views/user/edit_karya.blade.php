@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Karya | Dinamik')

@section('content')

@include('templates.dashboard-header')

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
        <span class=" dashboard-section-header">Edit Link Karya</span>
        <form action="{{route('dashboard.update.karya')}}" method="POST">
            @csrf
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
                            <input type="text" name="link_1" class="dashboard-form-text"
                                value="{{$team->creation->link_1}}" @if ($team->competition_id ==
                            4)
                            placeholder="Link Proposal"
                            @else
                            placeholder="Link Teaser Animasi"
                            @endif
                            required>
                        </td>
                    </tr>
                    @error('link_1')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('link_1')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
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
                            <input type="text" name="link_2" class="dashboard-form-text"
                                value="{{$team->creation->link_2}}" @if ($team->competition_id ==
                            4)
                            placeholder="Link Source Code Web"
                            @else
                            placeholder="Link Animasi (Full)"
                            @endif
                            required>
                        </td>
                    </tr>
                    @error('link_2')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('link_2')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                </table>
            </div>
            <button type="submit" class="dashboard-form-button">
                Update Link Karya
            </button>
        </form>
    </section>
</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection