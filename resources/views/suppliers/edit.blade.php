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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">تعديل بيانات المورد</h2>
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
                    <form action="{{ route('suppliers.update', $supplierData->id) }}" method="POST" class="parsley-style-1"
                        id="selectForm2" name="selectForm2">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6">
                                    <label>اسم المورد ثلاثي<span class="tx-danger">*</span></label>
                                    <input autofocus class="form-control" name="name" value="{{$supplierData->name}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>اسم التجاري: <span class="tx-danger">*</span></label>
                                    <input autofocus class="form-control" name="tradeName" value="{{$supplierData->tradeName}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم المورد الشخصي1: <span class="tx-danger">*</span></label>
                                    <input autofocus class="form-control" name="personalPhone1" value="{{$supplierData->personalPhone1}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم المورد الشخصي2: <span class="tx-danger">*</span></label>
                                    <input autofocus class="form-control" name="personalPhone2" value="{{$supplierData->personalPhone2}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم المورد التجاري1: <span class="tx-danger">*</span></label>
                                    <input autofocus class="form-control" name="tradePhone1" value="{{$supplierData->tradePhone1}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم المورد التجاري2: <span class="tx-danger">*</span></label>
                                    <input autofocus class="form-control" name="tradePhone2" value="{{$supplierData->tradePhone2}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>عنوان المورد الشخصي: <span class="tx-danger">*</span></label>
                                    <select name="personalAddress" id="" required="true" class="form-control">
                                        <option value="{{$supplierData->personalAddressID}}">{{$supplierData->personalAddress}}</option>
                                        @foreach ($getCities as $address)
                                            <option value="{{$address->id}}">{{$address->StateName}} - {{$address->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>عنوان المورد التجاري: <span class="tx-danger">*</span></label>
                                    <select name="tradeAddress" id="" required="true" class="form-control">
                                        <option value="{{$supplierData->tradeAddressID}}">{{$supplierData->tradeAddress}}</option>
                                        @foreach ($getCities as $address)
                                            <option value="{{$address->id}}">{{$address->StateName}} - {{$address->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم السجل: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="recordNumber" value="{{$supplierData->recordNumber}}">
                                </div>
                            </div>
                        </div>
                        <div class="mg-t-30">
                            <button class="btn btn-main-primary pd-x-20" type="submit">حفظ</button>
                        </div>
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
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
