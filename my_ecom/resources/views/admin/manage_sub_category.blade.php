@extends('admin/layout')
@section('page_title','Category')
@section('category_select','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
<h1 class="mb10">{{$name}} Category</h1>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('category.manage_category_process')}}/{{$id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="category_name" class="control-label mb-1">Category Name</label>
                                        <input id="category_name" value="" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                        <input id="category_slug" value="" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        @error('category_slug')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="image" class="control-label mb-1"> Image</label>
                                        <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                        @error('category_image')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="image" class="control-label mb-1"> Show in Home Page</label>
                                        <input id="is_home" name="is_home" type="checkbox">
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
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->category_name}}</td>
                        <td>{{$list->category_slug}}</td>
                        <td>
                            <img width="100px" src="{{asset('/storage/upload/category/'.$list->category_image)}}" />

                        </td>
                        <td>
                            <div class="table-data-feature">
                                @if($list->status==1)
                                <a href="{{url('admin/category/status/0')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Active">
                                        <i class="zmdi zmdi-eye"></i>
                                    </button>
                                </a>
                                @elseif($list->status==0)
                                <a href="{{url('admin/category/status/1')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Deactive">
                                        <i class="zmdi zmdi-eye-off"></i>
                                    </button>
                                </a>
                                @endif
                                <a href="{{url('admin/category/manage_category/')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </a>
                                <a href="{{url('admin/category/delete')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </a>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </div>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>

@endsection