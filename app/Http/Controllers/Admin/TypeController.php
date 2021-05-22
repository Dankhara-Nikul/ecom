<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        $result['data']=Type::all();
       return view('admin/type',$result);
    }
    public function manage_type_process(Request $request)
    {
       $request->validate([
            
            'type'=>'required | unique:types,type,'.$request->post('id'),
       ]);
       
       if($request->post('id')>0)
       {
        $model=Type::find($request->post('id'));
        $msg="Type Updateed";
       }
       else{
        $model=new Type();
        $msg="Type Insert";
       }
       $model->type=$request->post('type');
       
       $model->status=1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('admin/type/manage_type');   
    }


    
    public function manage_type(Request $request,$id='')
    {
        if($id>0)
        {
            
            $arr=Type::where(['id'=>$id])->get();
          //  echo $arr;
           $result['type']=$arr['0']->type;
          $result['status']=$arr['0']->status;
          $result['id']=$arr['0']->id;

        }
        else
        {
            $result['type']='';
            $result['status']='';
            $result['id']=0;
        }
       
        return view('admin/manage_type',$result);
    }

   
    public function delete(Request $request,$id)
    {
        $model=Type::find($id);
        $model->delete();
        $request->session()->flash('message','Type Deleted');
        return redirect('admin/type');
    }
    public function status(Request $request,$status,$id)
    {
        $model=Type::find($id);
        $model->status=$status;
        $model->save();
       
        return redirect('admin/type');
    }
}
