@extends('layouts.app')
@section('title','details travel')

@section('content')
    <main>
        <section class="section-details-header"> </section>
            <section class="section-details-content">
                <div class="container">
                    <div class="row">
                        <div class="col p-0">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        Paket Travel
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- image -->
                    <div class="row">
                        <div class="col-lg-8 pl-lg-0">
                            <div class="card card-details">
                                <h1>{{ $item->title }}</h1>
                                <p>{{ $item->location }}</p>

                                @if ($item->galleries->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img
                                            src="{{ Storage::url($item->galleries->first()->image) }}"
                                            class="xzoom"
                                            id="xzoom-default"
                                            xoriginal="{{ Storage::url($item->galleries->first()->image) }}"
                                            />
                                    </div>
                                    <div class="xzoom-thumbs">
                                        @foreach ($item->galleries as $gallery)
                                        <a href="{{ Storage::url($gallery->image) }}">
                                            <img
                                            src="{{ Storage::url($gallery->image) }}"
                                            class="xzoom-gallery"
                                            width="128"
                                            xpreview="{{ Storage::url($gallery->image) }}"
                                            />
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <h2>About Travel</h2>
                                <p>
                                    {!! $item->about !!}
                                </p>
                                <div class="features row">
                                    <div class="col-md-4 border-left">
                                        <img src="{{ url('frontend/images/ic_tiket.png') }}" alt="" class="featured-image">
                                        <div class="description">
                                            <h3>Featured Event</h3>
                                            <p>{{ $item->featured_event }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 border-left">
                                        <img src="{{ url('frontend/images/ic_bahasa.png') }}" alt="" class="featured-image">
                                        <div class="description">
                                            <h3>Language</h3>
                                            <p>{{ $item->language }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 border-left">
                                        <img src="{{ url('frontend/images/ic_foods.png') }}" alt="" class="featured-image">
                                        <div class="description">
                                            <h3>Foods</h3>
                                            <p>{{ $item->foods }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-details card-right">
                                <h2>Members are going</h2>
                                <div class="members my-2">
                                    <img src="{{ url('frontend/images/member1.png') }}" class=
                                    "member-image mr-1">
                                    <img src="{{ url('frontend/images/member2.png') }}" class=
                                    "member-image mr-1">
                                    <img src="{{ url('frontend/images/member4.png') }}" class=
                                    "member-image mr-1">
                                    <img src="{{ url('frontend/images/member5.png') }}" class=
                                    "member-image mr-1">
                                    <img src="{{ url('frontend/images/member6.png') }}" class=
                                    "member-image mr-1">
                                    <img src="{{ url('frontend/images/member3.png') }}" class=
                                    "member-image mr-1">
                                </div>
                                <hr>
                                <h2>Trip Information</h2>
                                <table class="trip-informations">
                                    <tr>
                                        <th width="50%">Date of derpature</th>
                                        <td width="50%" class="text-right">
                                            {{  \Carbon\Carbon::create($item->departure_date)->format('F n, Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Duration</th>
                                        <td width="50%" class="text-right">
                                            {{ $item->duration }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Type</th>
                                        <td width="50%" class="text-right">
                                            {{ $item->type }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Price</th>
                                        <td width="50%" class="text-right">
                                            ${{ $item->price }}.00/person
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="join-container">
                                @auth
                                    <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-block btn-join-now mt-5 py-2" type="submit">
                                            Join Now
                                        </button>
                                    </form>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-5 py-2">
                                        Login or Register
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>

                </div>
            </section>
    </main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}" />
@endpush

@push('addons-script')
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth:500,
                title:false,
                tint:'#333',
                xoffset:15
            });
        });
    </script>
@endpush
