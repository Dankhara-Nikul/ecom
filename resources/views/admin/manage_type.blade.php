@extends('admin/layout');
@section('page_title','Manage Type')
@section('container')
<H3>Manage Type</H3>
<div class="row pt-2">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header row">
                <div class="col-6">
                    <a href="{{url('admin/type')}}">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="fa fa-arrow-left"></i>Back
                        </button>
                    </a>
                </div>
                <div class="text-danger col-6" role="alert">
                    {{session('message')}}
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Type Detail</h3>
                </div>
                <hr>
                <form action="{{route('type.manage_type_process')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Type</label>
                        <input id="cc-pament" name="type" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$type}}" required>
                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true">
                        @error('type')
                        {{$message}}
                        @enderror
                        </span>
                    </div>
                    
                    


                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="zmdi zmdi-plus"></i>&nbsp;
                            <span id="payment-button-amount">Add</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>
                    <input type="hidden" name="id" value="{{$id}}"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection