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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">كافة المناديب</h2>
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
                <a href="{{ route('delegates.create') }}" class="btn btn-primary">أضافة مندوب</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>اسم المندوب</th>
                                <th>الرقم القومي</th>
                                <th>العمر</th>
                                <th>العنوان بالتفصيل</th>
                                <th>صورة شخصية</th>
                                <th>صورة البطاقة</th>
                                <th>رقم فون شخصي1-2</th>
                                <th>رقم فون اقرب الاقارب</th>
                                <th>ملاحظات1</th>
                                <th>ملاحظات2</th>
                                <th>رقم الملف</th>
                                <th>اسم تجاري</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($delegates as $delegate)
                                <tr>
                                    <td>{{ $delegate->name }}</td>
                                    <td>{{ $delegate->nationalID }}</td>
                                    <td>{{ $delegate->age }}</td>
                                    <td>{{ $delegate->address }}</td>
                                    <td>
                                        <img src="uploads/delegates/{{ $delegate->personalPhoto }}" alt="">
                                    </td>
                                    <td>
                                        <img src="uploads/delegates/{{ $delegate->cardImage }}" alt="">
                                    </td>
                                    <td>{{ $delegate->phone1 }} - {{ $delegate->phone2 }}</td>
                                    <td>{{ $delegate->phone3 }}</td>
                                    <td>{{ $delegate->notes1 }}</td>
                                    <td>{{ $delegate->notes2 }}</td>
                                    <td>{{ $delegate->fileNumber }}</td>
                                    <td>{{ $delegate->tradeName }}</td>
                                    <td>
                                        <a href="{{ route('delegates.edit', $delegate->id) }}">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('delegates.destroy', $delegate->id) }}" class="d-inline-block"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none; background: transparent"
                                                class="fa fa-trash text-danger ml-3"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
