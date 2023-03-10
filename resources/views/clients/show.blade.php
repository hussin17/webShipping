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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">بيانات الشحنة</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    {{-- Table [name - edit] --}}
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1></h1>
                <a href="{{ route('clients.create') }}" class="btn btn-primary">أضافة شحنة</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                            <tr>
                                <th>تاريخ الاضافة</th>
                                <td>{{ $client->date_added }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ التعديل</th>
                                <td>{{ $client->date_updated }}</td>
                            </tr>
                            <tr>
                                <th>الكود</th>
                                <td>{{ $client->code }}</td>
                            </tr>
                            <tr>
                                <th>اسم المستلم</th>
                                <td>{{ $client->name }}</td>
                            </tr>
                            <tr>
                                <th>رقم تليفونه</th>
                                <td>{{ $client->phone1 }}</td>
                            </tr>
                            <tr>
                                <th>2رقم تليفونه</th>
                                <td>{{ $client->phone2 }}</td>
                            </tr>
                            <tr>
                                <th>محافظة العميل</th>
                                <td>{{ $client->listName }} - {{ $client->stateName }}</td>
                            </tr>
                            <tr>
                                <th>العنوان بالتفصيل</th>
                                <td>{{ $client->address }}</td>
                            </tr>
                            <tr>
                                <th>اسم المورد</th>
                                <td>{{ $client->supplierName }}</td>
                            </tr>
                            <tr>
                                <th>محافظة المورد</th>
                                <td>{{ $client->supplierState }}</td>
                            </tr>
                            <tr>
                                <th>تعليمات التسليم</th>
                                <td>{{ $client->instructions }}</td>
                            </tr>
                            <tr>
                                <th>الوزن</th>
                                <td>{{ $client->weight }}</td>
                            </tr>
                            <tr>
                                <th>الابعاد</th>
                                <td>{{ $client->dimensions }}</td>
                            </tr>
                            <tr>
                                <th>عدد القطع</th>
                                <td>{{ $client->nPieces }}</td>
                            </tr>
                            <tr>
                                <th>قيمة الشحنة</th>
                                <td>{{ $client->vShipment }}</td>
                            </tr>
                            <tr>
                                <th>قيمة الشحن</th>
                                <td>{{ $client->shippingValue }}</td>
                            </tr>
                            <tr>
                                <th>الاجمالي</th>
                                <td>{{ $client->vShipment - $client->shippingValue }}</td>
                            </tr>
                            <tr>
                                <th>الملاحظات 1</th>
                                <td>{{ $client->notes1 }}</td>
                            </tr>
                            <tr>
                                <th>الملاحظات 2</th>
                                <td>{{ $client->notes2 }}</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
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
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
