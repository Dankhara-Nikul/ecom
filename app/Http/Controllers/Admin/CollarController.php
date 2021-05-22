<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Collar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;    
class CollarController extends Controller
{
    public function index()
    {
        $result['data']=Collar::all();
       return view('admin/collar',$result);
    }
    public function manage_collar_process(Request $request)
    {
       $request->validate([
            
            'collar'=>'required | unique:collars,collar,'.$request->post('id'),
       ]);
       
       if($request->post('id')>0)
       {
        $model=Collar::find($request->post('id'));
        $msg="Collar Updateed";
       }
       else{
        $model=new Collar();
        $msg="Collar Insert";
       }
       $model->collar=$request->post('collar');
       
       $model->status=1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('admin/collar/manage_collar');   
    }


    
    public function manage_collar(Request $request,$id='')
    {
        if($id>0)
        {
            
            $arr=Collar::where(['id'=>$id])->get();
          //  echo $arr;
           $result['collar']=$arr['0']->collar;
          $result['status']=$arr['0']->status;
          $result['id']=$arr['0']->id;

        }
        else
        {
            $result['collar']='';
            $result['status']='';
            $result['id']=0;
        }
       
        return view('admin/manage_collar',$result);
    }

   
    public function delete(Request $request,$id)
    {
        $model=Collar::find($id);
        $model->delete();
        $request->session()->flash('message','Collar Deleted');
        return redirect('admin/collar');
    }
    public function status(Request $request,$status,$id)
    {
        $model=Collar::find($id);
        $model->status=$status;
        $model->save();
       
        return redirect('admin/collar');
    }
}
