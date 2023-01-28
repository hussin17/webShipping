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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">تعديل بيانات الطلبية</h2>
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
                    <form action="{{ route('orders.update', $orderData->id) }}" method="POST" class="parsley-style-1"
                        id="selectForm2" name="selectForm2">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6">
                                    <label>اسم العميل: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="clientName" required="true">
                                        <option value="{{ $orderData->client_id }}">{{ $orderData->ClientName }}</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="parsley-input col-md-6">
                                    <label>اسم المورد: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="supplierName" required="true">
                                        <option value="{{ $orderData->supplier_id }}">{{ $orderData->SupplierName }}
                                        </option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="parsley-input col-md-4">
                                    <label>مكان الوصول: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="originPlace" required="true">
                                        <option value="{{ $orderData->originId }}">{{ $orderData->originPlace }}
                                        </option>
                                        @foreach ($lk_city as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="parsley-input col-md-4">
                                    <label>مكان الاستلام: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="deliveryPlace" required="true">
                                        <option value="{{ $orderData->deliveryId }}">{{ $orderData->deliveryPlace }}
                                        </option>
                                        @foreach ($lk_city as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="parsley-input col-md-4">
                                    <label>مكان الاستلام: <span class="tx-danger">*</span></label>
                                    <textarea name="details_address" class="form-control"
                                        placeholder="العنوان التفصيلي">{{ $orderData->details_address }}</textarea>
                                </div>
                                <div class="parsley-input col-md-4">
                                    <label>المبلغ: <span class="tx-danger">*</span></label>
                                    <input value="{{ $orderData->mount }}" type="text" placeholder="مبلغ الطلبية"
                                        class="form-control" name="mount" required="true">
                                    @error('mount')
                                        <div class="alert alert-danger">يرجى ادخال قيمة الطلبية</div>
                                    @enderror
                                </div>
                                <div class="parsley-input col-md-4">
                                    <label>الحجم: </label>
                                    <input value="{{ $orderData->size }}" type="text" placeholder="حجم الطلبية"
                                        class="form-control" name="size">
                                </div>
                                <div class="parsley-input col-md-4">
                                    <label>الوزن: </label>
                                    <input value="{{ $orderData->weight }}" type="text" placeholder="وزن الطلبية"
                                        class="form-control" name="weight">
                                </div>
                                <div class="parsley-input col-md-12">
                                    <label>ملاحظات: </label>
                                    <textarea type="text" placeholder="ملاحظات" class="form-control" name="notes">{{ $orderData->notes }}</textarea>
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
