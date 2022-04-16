@extends('layouts/landing/landing')

@section('content')
<!-- Recent Case Section Start Here -->
<section class="portfolio-section padding-tb">
    <div class="container">
        <div class="section-header">
            <span>Aktivitas CSR</span>
            <h2>Semen Indonesia</h2>
        </div>
        <div class="section-wrapper">
            <div class="container">
                @foreach($realtimeActivities as $key => $realtimeActivity)
                <div class="row align-items-center">
                    <div class="col-xl-6 col-12">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($realtimeActivity->photo as $key => $media)
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ $media->getUrl('thumb') }}" alt="First slide">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12">
                        <div class="lab-content">
                            <h2>{{ $realtimeActivity->title ?? '' }}</h2>
                            <h4>{{ $realtimeActivity->date ?? '' }}</h4>
                            <p>{{ $realtimeActivity->description ?? '' }}</p>
                            <ul>
                                <li>
                                    <div class="w-10">
                                        <h6>Lokasi Kegiatan</h6>
                                        <p>{{ $realtimeActivity->location}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="w-10">
                                        <h6>{{$realtimeActivity->number_of_beneficiaries}} Penerima Manfaat</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="w-10">
                                        <h6>{{$realtimeActivity->receiver}} (Penerima Bantuan)</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
