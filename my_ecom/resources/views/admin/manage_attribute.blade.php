    @extends('admin/layout')
    @section('page_title','Attribute')
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
    <h1 class="mb10">{{$name}} Attribute</h1>

    <a href="{{url('admin/category/manage_attribute_add')}}/{{$sub_category_id}}">
        <button type="button" class="btn btn-success">
            Add Attribute
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
                                <th>Attribute Name</th>
                                <th>Attribute Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->attributes_name}}</td>
                                <td>{{$list->attributes_value}}</td>

                                <td>
                                    <div class="table-data-feature">


                                        <a href="{{url('admin/category/manage_attribute_update')}}/{{$sub_category_id}}/{{$list->id}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('admin/attribute/delete/')}}/{{$list->id}}">
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