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
<h1 class="mb10">Category</h1>
<a href="{{url('admin/category/manage_category')}}">
    <button type="button" class="btn btn-success">
        Add Category
    </button>
</a>
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
                        <img width="100px" src="{{asset('/storage/upload/category/'.$list->category_image)}}"/>
                        
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
                                <a href="{{url('admin/category/manage_sub_category/')}}/{{$list->id}}">
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