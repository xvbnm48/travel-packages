@extends('layouts.admin')
@section('title')
    Nomads Admin
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Packet travel {{ $item->title }}</h1>
        </div>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('travel-package.update', $item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control" name="title" placeholder="title" value="{{ $item->title }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="location" value="{{ $item->location }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" rows="10" class="d-dblock w-100 from-control">{{ $item->about }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="featured_event">Featured event</label>
                        <input type="text" class="form-control" name="featured_event" placeholder="featured_event" value="{{ $item->featured_event }}">
                    </div>
                    <div class="form-group">
                        <label for="language">language</label>
                        <input type="text" class="form-control" name="language" placeholder="language" value="{{ $item->language }}">
                    </div>
                    <div class="form-group">
                        <label for="foods">Foods</label>
                        <input type="text" class="form-control" name="foods" placeholder="foods" value="{{ $item->foods }}">
                    </div>
                    <div class="form-group">
                        <label for="departure_date">departure date</label>
                        <input type="date" class="form-control" name="departure_date" placeholder="departure_date" value="{{ $item->departure_date }}">
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" name="duration" placeholder="duration" value="{{ $item->duration }}">
                    </div>
                    <div class="form-group">
                        <label for="type">type</label>
                        <input type="text" class="form-control" name="type" placeholder="type" value="{{ $item->type }}">
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" class="form-control" name="price" placeholder="price" value="{{ $item->price }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
</div>
<!-- /.container-fluid -->

@endsection
