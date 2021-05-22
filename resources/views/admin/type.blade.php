@extends('admin/layout');
@section('page_title','Type')
@section('type_select','active')
@section('container')
<h1>Product Type</h1>

<div class="row pt-3">
    <div class="col-md-12">
        <!-- DATA TABLE -->

        <div class="table-data__tool">

            <a href="{{url('admin/type/manage_type')}}">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>add item
                </button>
            </a>

        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr >
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>ID</th>
                        <th>Type</th>
                        <th></th>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{$list->id}}</td>
                        <td>{{$list->type}}</td>
                        <td></td>
                        
                        <td> </td>
                        <td></td>
                        <td>
                            <div class="table-data-feature">

                                @if($list->status==1)
                                <a href="{{url('admin/type/status/0')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Active">
                                        <i class="zmdi zmdi-eye"></i>
                                    </button>
                                </a>
                                @elseif($list->status==0)
                                <a href="{{url('admin/type/status/1')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Deactive">
                                        <i class="zmdi zmdi-eye-off"></i>
                                    </button>
                                </a>
                                @endif
                                <a href="{{url('admin/type/manage_type/')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </a>
                                <a href="{{url('admin/type/delete')}}/{{$list->id}}">
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
                    <tr class="spacer"></tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection