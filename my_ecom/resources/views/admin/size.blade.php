@extends('admin/layout')
@section('page_title','Size')
@section('size_select','active')
@section('container')
    @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{session('message')}}  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
    @endif                           
    <h1 class="mb10">Size</h1>
    <a href="{{url('admin/size/manage_size')}}">
        <button type="button" class="btn btn-success">
            Add Size
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
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->size}}</td>
                            <td>
                            <div class="table-data-feature">
                                @if($list->status==1)
                                <a href="{{url('admin/size/status/0')}}/{{$list->id}}">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Active">
                                    <i class="zmdi zmdi-eye"></i>
                                </button>
                                </a>
                                @elseif($list->status==0)
                                <a href="{{url('admin/size/status/1')}}/{{$list->id}}">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Deactive">
                                    <i class="zmdi zmdi-eye-off"></i>
                                </button>
                                </a>
                                @endif
                                <a href="{{url('admin/size/manage_size/')}}/{{$list->id}}">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                </a>    
                                <a href="{{url('admin/size/delete')}}/{{$list->id}}">
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