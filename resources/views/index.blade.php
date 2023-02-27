@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                {{-- <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا, {{ Auth::user()->name }} مرحبا بعودتك!</h2> --}}
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        {{-- States --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . ($page = 'states')) }}">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h2 class="mb-3 tx-6 text-white">المحافظات</h2>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                        ${{ DB::table('lk_state')->count('id') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- Cities --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . ($page = 'cities')) }}">
                <div class="card overflow-hidden sales-card bg-success-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h2 class="mb-3 tx-6 text-white">المدن</h2>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                        ${{ DB::table('lk_city')->count('id') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- Clients --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . ($page = 'clients')) }}">
                <div class="card overflow-hidden sales-card bg-warning-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h2 class="mb-3 tx-6 text-white">الشحنات</h2>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                        ${{ DB::table('clients')->count('id') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- Suppliers --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . ($page = 'suppliers')) }}">
                <div class="card overflow-hidden sales-card bg-purple-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h2 class="mb-3 tx-6 text-white">الموردين</h2>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                        ${{ DB::table('suppliers')->count('id') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- delegates --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . ($page = 'delegates')) }}">
                <div class="card overflow-hidden sales-card bg-purple-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h2 class="mb-3 tx-6 text-white">المناديب</h2>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                        ${{ DB::table('delegates')->count('id') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- Orders --}}
        {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <a href="{{ url('/' . ($page = 'orders')) }}">
                        <div class="">
                            <h2 class="mb-3 tx-6 text-white">الطلبات</h2>
                        </div>
                    </a>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    ${{ DB::table('orders')->count('id') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- row closed -->
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
@endsection
