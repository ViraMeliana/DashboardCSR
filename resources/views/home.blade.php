@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Analytics')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice-list.css')) }}">
@endsection

@section('content')
    <!-- Dashboard Analytics Start -->
    <section id="dashboard">
        <div class="row match-height">
            <!-- Greetings Card starts -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img
                            src="{{asset('images/elements/decore-left.png')}}"
                            class="congratulations-img-left"
                            alt="card-img-left"
                        />
                        <img
                            src="{{asset('images/elements/decore-right.png')}}"
                            class="congratulations-img-right"
                            alt="card-img-right"
                        />
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">Welcome {{auth()->user()->name}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Greetings Card ends -->
        </div>

        <div class="col-12">
            <div class="card" id="tjsl-statistics-bar">
                <div
                    class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
                    <div>
                        <h4 class="card-title">Realisasi RKAP 1 Tahun</h4>
                        <span
                            class="card-subtitle text-muted">Detail statistik rkap dan real selamat setahun.</span>
                    </div>

                    <div class="align-items-center">
                        <form data-action="{{ route('admin.tjsls.showChart') }}" id="tjsl-statistic-bar-form"
                              class="tjsl-statistic-bar-form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <select name="year" class="form-control tjsl-statistic-bar-filter">
                                        @foreach($tjslYear as $index => $value)
                                            <option value="{{ $value }}"> {{ $index }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="chart_type" value="tjsl_statistic_bar_type">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div id="tjsl-statistics-bar-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card" id="tjsl-insidentil-bar">
                <div
                    class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
                    <div>
                        <h4 class="card-title">Realisasi TJSL Insidentil 1 Tahun</h4>
                        <span
                            class="card-subtitle text-muted">Detail TJSL Insidentil tahunan.</span>
                    </div>

                    <div class="align-items-center">
                        <form data-action="{{ route('admin.tjsls.showChart') }}" id="tjsl-insidentil-bar-form"
                              class="tjsl-insidentil-bar-form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <select name="year" class="form-control tjsl-insidentil-bar-filter">
                                        @foreach($tjslInsidentilYear as $index => $value)
                                            <option value="{{ $value }}"> {{ $index }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="chart_type" value="tjsl_insidentil_bar_type">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div id="tjsl-insidentil-bar-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card" id="tjsl-statistics">
                <div
                    class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
                    <div>
                        <h4 class="card-title">Realisasi Anggaran TJSL SIG Group Per Pilar</h4>
                        <span
                            class="card-subtitle text-muted">Detail statistik produk bulanan selama setahun.</span>
                    </div>
                    <div class="align-items-center">
                        <form data-action="{{ route('admin.tjsls.showChart') }}" id="tjsl-statistic-form"
                              class="tjsl-statistic-form">
                            @csrf
                            <input type="hidden" name="chart_type" value="tjsl_statistic_type">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div id="tjsl-statistics-chart"></div>
                </div>
            </div>
        </div>

    </section>
    <!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>

@endsection
