<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $result['data']=DB::table('categories')->where(['status'=>1])->where('parent_category_id','=',0)->get();
        return view('admin/category',$result);
    }

    
    public function manage_category(Request $request,$id='')
    {
        if($id>0){
            $arr=Category::where(['id'=>$id])->get(); 

            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['parent_category_id']=0;
            $result['category_image']=$arr['0']->category_image;
            $result['is_home']=$arr['0']->is_home;
            $result['is_home_selected']="";
            if($arr['0']->is_home==1){
                $result['is_home_selected']="checked";
            }
            $result['id']=$arr['0']->id;

            $result['category']=DB::table('categories')->where(['status'=>1])->where('id','!=',$id)->get();
        }else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['parent_category_id']='';
            $result['category_image']='';
            $result['is_home']="";
            $result['is_home_selected']="";
            $result['id']=0;

            $result['category']=DB::table('categories')->where(['status'=>1])->get();
            
        }

        return view('admin/manage_category',$result);
    }
    public function manage_sub_category(Request $request,$id='')
    {  
        $arr=Category::where(['id'=>$id])->get();
        $result['id']=$arr['0']->id;
        $result['name']=$arr['0']->category_name;
            $result['data']=DB::table('categories')->where('parent_category_id','=',$id)->get();
           
        return view('admin/manage_sub_category',$result);
    }
    
    

    public function manage_category_process(Request $request,$cid='')
    {
        //return $request->post();
        
        $request->validate([
            'category_name'=>'required',
            'category_image'=>'mimes:jpeg,jpg,png',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),   
        ]);

        if($request->post('id')>0){
            $model=Category::find($request->post('id'));
            $msg="Category updated";
        }else{
            $model=new Category();
            $msg="Category inserted";
        }

        if($request->hasfile('category_image')){

            if($request->post('id')>0){
                $arrImage=DB::table('categories')->where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/storge/media/category/'.$arrImage[0]->category_image)){
                    Storage::delete('/public/storage/media/category/'.$arrImage[0]->category_image);
                }
            }
            
        if (!Storage::disk('public')->exists('upload/category')) {
            Storage::disk('public')->makeDirectory('upload/category');
        }
            $image=$request->file('category_image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/upload/category',$image_name);
            $model->category_image=$image_name;
        }
        $model->category_name=$request->post('category_name');
        $model->category_slug=$request->post('category_slug');
        if($cid=='')
        {
            $model->parent_category_id=0;
        }
        else{
            $model->parent_category_id=$cid;
        }
       
        $model->is_home=0;
        if($request->post('is_home')!==null){
            $model->is_home=1;
        }
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        if($cid=='')
        {
            return redirect('admin/category');
        }
        else{
            return redirect('admin/category/manage_sub_category/'.$cid);
        }
       
        
    }

    public function delete(Request $request,$id){
        $model=Category::find($id);
        $arr=Category::where(['id'=>$id])->get();
        $pid=$arr['0']->parent_category_id;
        $model->delete();
        $request->session()->flash('message','Category deleted');
        if($pid!=0)
        {
            return redirect('admin/category/manage_sub_category/'.$pid);
        }
        else{
            return redirect('admin/category');
        }
    }

    public function status(Request $request,$status,$id){
        $model=Category::find($id);
        $arr=Category::where(['id'=>$id])->get();
        $pid=$arr['0']->parent_category_id;
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category status updated');
        if($pid!=0)
        {
            return redirect('admin/category/manage_sub_category/'.$pid);
        }
        else{
            return redirect('admin/category');
        }
        
    }

    

    
}
