<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
       
        $arrImage['image'] = DB::table('products_attr')->get();
        return view('admin/media',$arrImage);
    }
    public function image_upload(Request $request)
    {
        $request->validate([
            'category_image'=>'mimes:jpeg,jpg,png',
        ]);
          if ($request->hasfile('images')) {
            $images = $request->file('images');
            foreach($images as $image) {
                $name = $image->getClientOriginalName();
                $image->storeAs('/public/upload/product/',$name);
                $model=media::find($request->post('id'));
            }
          }
        
       
        $arrImage['image'] = DB::table('products_attr')->get();
        return view('admin/media',$arrImage);
    }

    
  
}
