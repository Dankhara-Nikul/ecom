@extends('admin/layout');
@section('page_title','Manage Pattern')
@section('container')
<H3>Manage Pattern</H3>
<div class="row pt-2">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header row">
                <div class="col-6">
                    <a href="{{url('admin/pattern')}}">
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
                    <h3 class="text-center title-2">Pattern Detail</h3>
                </div>
                <hr>
                <form action="{{route('pattern.manage_pattern_process')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Pattern</label>
                        <input id="cc-pament" name="pattern" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pattern}}" required>
                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true">
                        @error('pattern')
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