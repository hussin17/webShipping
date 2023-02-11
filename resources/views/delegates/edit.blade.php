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
                    <form action="{{ route('delegates.update', $delegateData->id) }}" method="POST" class="parsley-style-1" enctype="multipart/form-data"
                        id="selectForm2" name="selectForm2">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6">
                                    <label>اسم المندوب ثلاثي<span class="tx-danger">*</span></label>
                                    <input autofocus class="form-control" name="name" value="{{$delegateData->name}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم البطاقة: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="nationalID" value="{{$delegateData->nationalID}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>العمر: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="age" value="{{$delegateData->age}}"
                                        required="true" type="number">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>العنوان تفصيلي: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="address" placeholder="المحافظة - المدينة - القرية - الشارع"
                                        required="true">{{ $delegateData->address }}</textarea>
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>الصورة الشخصية: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="personalPhoto" value="{{$delegateData->personalPhoto}}"
                                        required="true" type="file">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>صورة البطاقة: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="cardImage" value="{{$delegateData->cardImage}}"
                                        required="true" type="file">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم المندوب الشخصي1: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="phone1" value="{{$delegateData->phone1}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم المندوب الشخصي2: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="phone2" value="{{$delegateData->phone2}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم فون اقرب الاقارب: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="phone3" value="{{$delegateData->phone3}}"
                                        required="true" type="text">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>1ملاحظات: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="notes1">{{$delegateData->notes1}}</textarea>
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>2ملاحظات: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="notes2">{{$delegateData->notes2}}</textarea>
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>رقم الملف: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="fileNumber" value="{{$delegateData->fileNumber}}">
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>الاسم التجاري: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="tradeName" value="{{$delegateData->tradeName}}">
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
