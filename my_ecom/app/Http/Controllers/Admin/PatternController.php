<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Pattern;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatternController extends Controller
{
    public function index()
    {
        $result['data']=Pattern::all();
       return view('admin/pattern',$result);
    }
    public function manage_pattern_process(Request $request)
    {
       $request->validate([
            
            'pattern'=>'required | unique:patterns,pattern,'.$request->post('id'),
       ]);
       
       if($request->post('id')>0)
       {
        $model=Pattern::find($request->post('id'));
        $msg="Pattern Updateed";
       }
       else{
        $model=new Pattern();
        $msg="Pattern Insert";
       }
       $model->pattern=$request->post('pattern');
       
       $model->status=1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('admin/pattern/manage_pattern');   
    }


    
    public function manage_pattern(Request $request,$id='')
    {
        if($id>0)
        {
            
            $arr=Pattern::where(['id'=>$id])->get();
          //  echo $arr;
           $result['pattern']=$arr['0']->pattern;
          $result['status']=$arr['0']->status;
          $result['id']=$arr['0']->id;

        }
        else
        {
            $result['pattern']='';
            $result['status']='';
            $result['id']=0;
        }
       
        return view('admin/manage_pattern',$result);
    }

   
    public function delete(Request $request,$id)
    {
        $model=Pattern::find($id);
        $model->delete();
        $request->session()->flash('message','Pattern Deleted');
        return redirect('admin/pattern');
    }
    public function status(Request $request,$status,$id)
    {
        $model=Pattern::find($id);
        $model->status=$status;
        $model->save();
       
        return redirect('admin/pattern');
    }
}
