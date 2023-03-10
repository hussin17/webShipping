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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">كافة الموردين</h2>
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
                <a href="{{ route('suppliers.create') }}" class="btn btn-primary">أضافة مورد</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>اللوجو</th>
                                <th>اسم المورد</th>
                                <th>اسم التجاري</th>
                                <th>رقم تليفونه</th>
                                <th>رقم المحل</th>
                                <th>عنوان المحل</th>
                                <th>العنوان الشخصي</th>
                                <th>رقم السجل</th>
                                <th>الموقع</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>
                                        <img src="uploads/suppliers/{{ $supplier->logo }}" alt="Logo" width="50" height="50">
                                    </td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->tradeName }}</td>
                                    <td>{{ $supplier->personalPhone1 }} - {{ $supplier->personalPhone2 }}</td>
                                    <td>{{ $supplier->tradePhone1 }} - {{ $supplier->tradePhone2 }}</td>
                                    <td>{{ $supplier->personalAddress }}</td>
                                    <td>{{ $supplier->tradeAddress }}</td>
                                    <td>{{ $supplier->recordNumber }}</td>
                                    <td>
                                        <a href="{{ $supplier->location }}" target="_blank">
                                            <i class="fa fa-map"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" class="d-inline-block"
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
