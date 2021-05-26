@extends('admin/layout')
@section('page_title','Manage Attribute')
@section('category_select','active')
@section('container')
<h1 class="mb10">Manage Attribute</h1>
<a href="{{url('admin/category/manage_attribute')}}/{{$sub_category_id}}">
    <button type="button" class="btn btn-success">
        Back
    </button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('category.manage_attribute_process')}}/{{$sub_category_id}}/{{$id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="attributes_name" class="control-label mb-1">Category Name</label>
                                        <input id="attributes_name" value="{{$attributes_name}}" name="attributes_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>



                                    <div class="col-md-4">
                                        <label for="attributes_value" class="control-label mb-1">Category Slug</label>
                                        <input id="attributes_value" value="{{$attributes_value}}" name="attributes_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        @error('category_slug')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        
                                    </div>
                                    <div class="col-md-2">
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                ADD
                                            </button>
                                        </div>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection