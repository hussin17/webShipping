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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">تعديل محافظة الشحن</h2>
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
                    <form action="{{ route('shippingStates.update', $shippingState->id) }}" method="POST" class="parsley-style-1"
                        id="selectForm2" name="selectForm2">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6">
                                    <label>قائمة الاسعار: <span class="tx-danger">*</span></label>
                                    <select autofocus class="form-control" name="list_id">
                                        <option value="{{$shippingState->list_id}}">{{$shippingState->listName}}</option>
                                        @foreach ($lists as $list)
                                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('list_id')
                                        <div class="alert alert-danger">يرجى اختيار القائمة</div>
                                    @enderror
                                </div>

                                <div class="parsley-input col-md-6">
                                    <label>المحافظات: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="state_id">
                                        <option value="{{$shippingState->state_id}}">{{$shippingState->stateName}}</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <div class="alert alert-danger">يرجى اختيار المحافظة</div>
                                    @enderror
                                </div>

                                <div class="parsley-input col-md-6">
                                    <label>سعر الشحن: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="shippingValue" value="{{ $shippingState->shippingValue }}"  type="text">
                                    @error('shippingValue')
                                        <div class="alert alert-danger">يرجى ادخال سعر الشحن</div>
                                    @enderror
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
