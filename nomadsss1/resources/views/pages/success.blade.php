@extends('layouts.success')
@section('title','checkout success')

@section('content')
<main>
    <div class="section-success d-flex align-item-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/logo_bank11.png') }}">
            <h1>Yay success</h1>
            <p>
                We’ve sent you email for trip
                instruction please read as well
            </p>
            <a href="{{ url('/') }}" class="btn btn-homepage mt-3 px-5">
                homepage
            </a>
        </div>
    </div>
</main>

@endsection

