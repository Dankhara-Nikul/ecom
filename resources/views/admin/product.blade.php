@extends('admin/layout')
@section('page_title','Product')
@section('product_select','active')
@section('container')
    @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{session('message')}}  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
    @endif                     
    <h1 class="mb10">Product</h1>
    <a href="{{url('admin/product/manage_product')}}">
        <button type="button" class="btn btn-success">
            Add Product
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->slug}}</td>
                            <td>
                            @if($list->image!='')
                                <img width="100px" src="{{asset('storage/media/'.$list->image)}}"/>
                            @endif
                            </td>
                            <td>
                                <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}">       

                                <div class="table-data-feature">
                                @if($list->status==1)
                                <a href="{{url('admin/product/status/0')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Active">
                                        <i class="zmdi zmdi-eye"></i>
                                    </button>
                                </a>
                                @elseif($list->status==0)
                                <a href="{{url('admin/product/status/1')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Deactive">
                                        <i class="zmdi zmdi-eye-off"></i>
                                    </button>
                                </a>
                                @endif
                                <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </a>
                                <a href="{{url('admin/product/delete')}}/{{$list->id}}">
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