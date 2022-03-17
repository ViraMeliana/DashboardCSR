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
                        <div class="lab-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                            <img src="{{ $realtimeActivity->photo[0]->getUrl() }}" alt="lab-shopapp">
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
                                        <p>{{ $realtimeActivity->location}}, {{$realtimeActivity->village}}, {{$realtimeActivity->subdistrict}}, {{$realtimeActivity->district}}, {{$realtimeActivity->province}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="w-10">
                                        <h6>{{$realtimeActivity->number_of_beneficiaries}} Penerima Manfaat</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="w-10">
                                        <h6>{{$realtimeActivity->receiver}} Penerima Bantuan</h6>
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
