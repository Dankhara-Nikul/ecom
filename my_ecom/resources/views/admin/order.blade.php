@extends('admin/layout')
@section('page_title','Order')
@section('order_select','active')
@section('container')
<h1 class="mb10">Order</h1>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="row mb-3 mt-5 ml-3">

            <select name="bluk" id="bluk">
                <option value="0">Bulk select</option>
                @foreach($order_status_list as $list)
                <option value="{{$list->id}}">{{$list->orders_status}}</option>
                @endforeach
            </select>

            <input class=" ml-2 btn btn-info" type="button" value="Apply" onclick="order_status()">

            <select name="date" id="date" class="ml-5">
                <option value="0">All Date</option>
                @foreach($orders as $list)

                <option value="{{$list->added_on}}">{{($list->added_on)}}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-primary m-l-10 m-b-10" onclick="order_filter()">Filter
             
            </button>
            <button type="button" class="btn btn-primary m-l-10 m-b-10" onclick="order_clear_filter()">Clear Filter
             
            </button>
            
        </div>

        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox" onclick="toggle(this)">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>Order ID</th>
                        <th>Customer Details</th>
                        <th>Amt</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Payment Type</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $list)
                    <tr>
                        <td id="ct1">
                            <label class="au-checkbox">
                                <input type="checkbox" name="chk" id="chk" value="{{$list->id}}">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td><a href="{{url('/admin/order_detail')}}/{{$list->id}}">{{$list->id}}</a></td>
                        <td>
                            {{$list->name}}<br />
                            {{$list->email}}<br />
                            {{$list->mobile}}<br />
                            {{$list->address}},{{$list->city}},{{$list->state}},{{$list->pincode}}
                        </td>
                        <td>{{$list->total_amt}}</td>
                        <td>{{$list->orders_status}}</td>
                        <td>{{$list->payment_status}}</td>
                        <td>{{$list->payment_type}}</td>
                        <td>{{$list->added_on}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{url('admin/order_detail/')}}/{{$list->id}}">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                        <i class="zmdi zmdi-view-day"></i>
                                    </button>
                                </a>

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