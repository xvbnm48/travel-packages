@extends('layouts.app')

@section('title','NOMADS')

@section('content')
<!-- header -->
<header class="text-center">
    <h1>
        Explore The Beautiful World
        <br>
        As Easy One Click
    </h1>
    <p class="mt-3">
        You Will beautiful
        <br>
        moment you never see before
    </p>
    <a href="#popular" class="btn btn-get-started px-4 mt-4">
        Get Started
    </a>
</header>
<!-- main -->
<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>30K</h2>
                <P>Members</P>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <P>Countries</P>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3K</h2>
                <P>Hotels</P>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>72</h2>
                <P>Partners</P>
            </div>
        </section>
    </div>

    <!-- card section -->
    <section class="section-popular" id="pupular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Wisata Popular</h2>
                    <p>Something that you never try
                        <br>
                        before in this world
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-popular-content" id="popularContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                @foreach ($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                            <div class="travel-countries">{{ $item->location }}</div>
                            <div class="travel-location">{{ $item->title }}</div>
                            <div class="travel-button mt-auto">
                                <a href="{{ route('detail',$item->slug) }}" class="btn btn-travel-details px-4">
                                    View details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- section network -->
    <section class="section-networks" id="network">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Networks</h2>
                    <p>companies are trusted us
                    <br>
                    more than just a trip</p>
                </div>
                <div class="col-md-8 text-center">
                    <img src="frontend/images/partner.png" alt="logo partner" class="img-partner">
                </div>
            </div>
        </div>
    </section>

    <!-- section testi -->
    <section class="section-testimonials-heading" id="testimonialsHeading">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>They are loving us</h2>
                    <p>
                        moment were giving them
                        <br>
                        the best experince
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-testimonials-content" id="testimonialsContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonials text-center">
                        <div class="testimonials-content">
                            <img src="frontend/images/testi1.png" alt="user" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Sakura miyawaki</h3>
                            <p class="testimonials">
                                “indonesia sangat indah
                                dan juga makanannya
                                enak enak
                                suasananya hangat”
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to palembang,Indonesia
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonials text-center">
                        <div class="testimonials-content">
                            <img src="frontend/images/testi3.png" alt="user" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Sashihara Rino</h3>
                            <p class="testimonials">
                                “Indonesia banyak
                                <br>
                                sekali gunung gunung yang indah”
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to gunung Bromo,Indonesia
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonials text-center">
                        <div class="testimonials-content">
                            <img src="frontend/images/testi2.png" alt="user" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Oota Aika</h3>
                            <p class="testimonials">
                                “indonesia orangnya
                                <br>
                                ramah ramah dan ada pantai yang indah”
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Bali,Indonesia
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                        I need Help
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
