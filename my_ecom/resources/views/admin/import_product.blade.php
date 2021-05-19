@extends('admin/layout')
@section('page_title','Import Product')
@section('product_select','active')
@section('container')
<div class="col-lg-9">
   <div class="card">
      <div class="card-header text-center">
         <h3>Import products from a CSV file</h3><br>

         <p class="text-left">This tool allows you to import (or merge)<br>product data to your store from a CSV or TXT file</p>
      </div>
      <div class="card-body card-block">
         <form action="" method="post" class="form-horizontal">
            <div class="row form-group">
               <div class="col col-sm-5">
                  <label for="input-small" class=" form-control-label">
                     Choose a CSV file from your computer:</label>
               </div>
               <div class="col col-sm-6">
                  <input type="file" id="input-small" name="input-small" placeholder=".form-control-sm" class="input-sm form-control-sm form-control">
               </div>
            </div>
            <div class="row form-group">
               <div class="col col-sm-5">
                  <label for="input-normal" class=" form-control-label">Update existing products</label>
               </div>
               <div class="col col-sm-6">
                  <div class="col col-sm-2">
                     <input type="checkbox" id="input-normal" name="input-normal" placeholder="Normal" class="form-control">
                  </div> 
                  Existing products that match by ID or SKU will be updated. Products that do not exist will be skipped.
               </div>
            </div>
         </form>
      </div>
      <div class="card-footer">
      <a href="{{url('admin/product/import_product_upload')}}">
         <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Next
         </button></a>
         
      </div>
   </div>
</div>
@endsection