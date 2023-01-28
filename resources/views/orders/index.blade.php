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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">كافة الطلبيات</h2>
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
                <a href="{{ route('orders.create') }}" class="btn btn-primary">أضافة طلبية</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>اسم العميل</th>
                                <th>رقم العميل</th>
                                <th>اسم المورد</th>
                                <th>رقم المورد</th>
                                <th>محافظة الوصول</th>
                                <th>محافظة الاستلام</th>
                                <th>عنوان تفصيلي</th>
                                <th>المبلغ</th>
                                <th>تاريخ اليوم</th>
                                <th>الحجم</th>
                                <th>الوزن</th>
                                <th>ملاحظات</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->ClientName }}</td>
                                    <td>{{ $order->ClientPhone }}</td>
                                    <td>{{ $order->SupplierName }}</td>
                                    <td>{{ $order->SupplierPhone }}</td>
                                    <td>{{ $order->originPlace }}</td>
                                    <td>{{ $order->deliveryPlace }}</td>
                                    <td>{{ $order->details_address }}</td>
                                    <td>{{ $order->mount }}</td>
                                    <td>{{ $order->orderDate }}</td>
                                    <td>{{ $order->size }}</td>
                                    <td>{{ $order->weight }}</td>
                                    <td>{{ Str::limit($order->notes, 10, '...') }}</td>

                                    {{-- <td>
                                        <a href="{{ route('orders.show', $order->id) }}">
                                            <i class="fas fa-eye text-primary"></i>
                                        </a>
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('orders.edit', $order->id) }}">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('orders.destroy', $order->id) }}" class="d-inline-block"
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
