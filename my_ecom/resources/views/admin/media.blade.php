@extends('admin/layout')
@section('page_title','Media')
@section('media_select','active')
@section('container')

<div class="row">
    <h1>Media</h1>
</div>
<hr>
<div class="row">
<form method="post" action="{{url('admin/media/upload')}}" enctype="multipart/form-data">
@csrf
        <div class="col-4">
            <section class="card">
                <input type="file" id="file-multiple-input" name="images[]" multiple accept="image/*>
            </section>
        </div>
        <div class="col-2">
            <section class="card">
           
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Upload
                </button>
            
            </section>
        </div>
</form>
</div>
<hr>
<div class="row">
    @foreach($image as $list)
    <div class="col-2">
        <section class="card text-center">
            <img src="{{asset('/storage/upload/product')}}/{{$list->attr_image}}">
            <p>{{$list->attr_image}}</p>
        </section>
    </div>
    @endforeach
</div>
@endsection