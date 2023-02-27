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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">أضافة شحنة</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    {{-- Form [name] --}}
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="body-header">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table">
                            <tr>
                                <td>
                                    كود:
                                    <input type="text" value="{{ old('code') }}" class="form-control" name="code">
                                </td>
                                <td>
                                    اسم المستلم:
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    @error('name')
                                        <div class="alert alert-danger">يرجى ادخال اسم المستلم</div>
                                    @enderror
                                </td>
                                <td>المحافظة:
                                    <select name="state_id" id="" class="form-control">
                                        <option value="">اختر...</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <div class="alert alert-danger">يرجى اختيار محافظة المستلم</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>العنوان تفصيلي:
                                    <textarea name="address" class="form-control" rows="auto"></textarea>
                                </td>
                                <td>
                                    تليفون 1:
                                    <input type="text" class="form-control" name="phone1">
                                    @error('phone1')
                                        <div class="alert alert-danger">يرجى ادخال رقم الهاتف بشكل صحيح</div>
                                    @enderror
                                </td>
                                <td>
                                    تليفون 2: <input type="text" class="form-control" name="phone2">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    اسم المورد:
                                    <select name="supplier_id" class="form-control">
                                        <option value="">اختر...</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <div class="alert alert-danger">يرجى اختيار اسم المورد</div>
                                    @enderror
                                </td>
                                <td>
                                    قيمة الشحنه:
                                    <input type="number" class="form-control" name="vShipment">
                                    @error('vShipment')
                                        <div class="alert alert-danger">يرجى ادخال قيمة الشحنة</div>
                                    @enderror
                                </td>
                                <td>
                                    عدد القطع:
                                    <input type="number" max="5000" min="1" name="nPieces" class="form-control">
                                    @error('nPieces')
                                        <div class="alert alert-danger">يرجى ادخال عدد القطع</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>الوزن: <input type="text" name="weight" class="form-control" name="weight"></td>
                                <td>
                                    الابعاد:
                                    <input type="text" class="form-control" name="dimensions">
                                </td>
                                <td colspan="2">
                                    تعليمات التسليم:
                                    <textarea name="instructions" class="form-control">{{ old('instructions') }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ملاحظات 1
                                    <textarea name="notes1" class="form-control"></textarea>
                                </td>
                                <td>
                                    ملاحظات 2
                                    <textarea name="notes2" class="form-control"></textarea>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
