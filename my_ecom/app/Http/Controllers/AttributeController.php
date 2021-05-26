<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{

    public function manage_attribute(Request $request, $id = '')
    {
        $arr = Category::where(['id' => $id])->get();
        $result['sub_category_id'] = $arr['0']->id;
        $result['name'] = $arr['0']->category_name;
        $result['data'] = DB::table('attributes')->where('sub_category_id', '=', $id)->get();

        return view('admin/manage_attribute', $result);
    }
    public function manage_attribute_add(Request $request, $cid = '', $id = '')
    {
        
       
        if ($id > 0) {
            $arrs = Attribute::where(['sub_category_id' => $cid])->get();
            $result['attributes_name'] = $arrs['0']->attributes_name;
            $result['attributes_value'] = $arrs['0']->attributes_value;
            $result['sub_category_id'] = $arrs['0']->sub_category_id;
            $result['id'] = $arrs['0']->id;
        }
        else{
            $result['attributes_name'] = '';
            $result['attributes_value'] ='';
            $result['sub_category_id'] = $cid;
            $result['id'] = $id;
        }
        
        return view('admin/manage_attribute_add', $result);
    }
    public function manage_attribute_process(Request $request,$id='',$at_id=''){
        $arr = Category::where(['id' => $id])->get();
        $result['id'] = $arr['0']->id;
        $result['name'] = $arr['0']->category_name;
        $result['data'] = DB::table('attributes')->where('sub_category_id', '=', $id)->get();
       
        if($at_id>0){
            $model=Attribute::find($at_id);
            $msg="Category updated";
           
        }else{
            $model=new Attribute();
            $msg="Category inserted";
        }

        $model->attributes_name=$request->post('attributes_name');
        $model->attributes_value=$request->post('attributes_value');
        $model->sub_category_id=$id;
        $model->save();
        $request->session()->flash($msg);
        return redirect('/admin/category/manage_attribute/'.$id);

    }
    public function delete(Request $request,$id){
        $model=Attribute::find($id);
        $arr=Attribute::where(['id'=>$id])->get();
        $pid=$arr['0']->sub_category_id;
        $model->delete();
        $request->session()->flash('message','Category deleted');
        
            return redirect('admin/category/manage_attribute/'.$pid);
       
    }
    
    
    
}
