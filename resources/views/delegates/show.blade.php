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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">تفاصيل المندوب</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    {{-- Table [name - edit] --}}
    <!--div-->
    <div class="col-xl-12">
        {{-- <a href="{{back()}}" class="btn btn-primary">الرجوع</a>
        <a href="{{route('delegates.edit', $delegate->id)}}" class="btn btn-info">التعديل</a>
        <a href="{{route('delegates.destroy', $delegate->id)}}" class="btn btn-danger">الحذف</a> --}}
        {{-- <div class="mb-3"></div> --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>اسم المندوب</th>
                            <td>{{$delegate->name}}</td>
                        </tr>
                        <tr>
                            <th>اسم المحل</th>
                            <td>{{$delegate->tradeName}}</td>
                        </tr>
                        <tr>
                            <th>الرقم القومي</th>
                            <td>{{$delegate->nationalID}}</td>
                        </tr>
                        <tr>
                            <th>العمر</th>
                            <td>{{$delegate->age}}</td>
                        </tr>
                        <tr>
                            <th>العنوان</th>
                            <td>{{$delegate->address}}</td>
                        </tr>
                        <tr>
                            <th>الصورة الشخصية</th>
                            <td>
                                <img width="500" src="/uploads/delegates/{{$delegate->personalPhoto}}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <th>صورة البطاقة</th>
                            <td>
                                <img width="500" src="/uploads/delegates/{{$delegate->cardImage}}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <th>رقم التليفون 1</th>
                            <td>{{$delegate->phone1}}</td>
                        </tr>
                        <tr>
                            <th>رقم التليفون 2</th>
                            <td>{{$delegate->phone2}}</td>
                        </tr>
                        <tr>
                            <th>رقم التليفون لاقرب الاقارب</th>
                            <td>{{$delegate->phone3}}</td>
                        </tr>
                        <tr>
                            <th>عنوانه</th>
                            <td>{{$delegate->nAddress}}</td>
                        </tr>
                        <tr>
                            <th>صفته</th>
                            <td>{{$delegate->adjective}}</td>
                        </tr>
                        <tr>
                            <th>ملاحظات 1</th>
                            <td>{{$delegate->notes1}}</td>
                        </tr>
                        <tr>
                            <th>ملاحظات 2</th>
                            <td>{{$delegate->notes2}}</td>
                        </tr>
                        <tr>
                            <th>رقم الملف</th>
                            <td>{{$delegate->fileNumber}}</td>
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
