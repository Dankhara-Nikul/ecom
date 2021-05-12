<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Fabric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FabricController extends Controller
{
    public function index()
    {
        $result['data']=Fabric::all();
       return view('admin/fabric',$result);
    }
    public function manage_fabric_process(Request $request)
    {
       $request->validate([
            
            'fabric'=>'required | unique:fabrics,fabric,'.$request->post('id'),
       ]);
       
       if($request->post('id')>0)
       {
        $model=Fabric::find($request->post('id'));
        $msg="Fabric Updateed";
       }
       else{
        $model=new Fabric();
        $msg="Fabric Insert";
       }
       $model->fabric=$request->post('fabric');
       
       $model->status=1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('admin/fabric/manage_fabric');   
    }


    
    public function manage_fabric(Request $request,$id='')
    {
        if($id>0)
        {
            
            $arr=Fabric::where(['id'=>$id])->get();
          //  echo $arr;
           $result['fabric']=$arr['0']->fabric;
          $result['status']=$arr['0']->status;
          $result['id']=$arr['0']->id;

        }
        else
        {
            $result['fabric']='';
            $result['status']='';
            $result['id']=0;
        }
       
        return view('admin/manage_fabric',$result);
    }

   
    public function delete(Request $request,$id)
    {
        $model=Fabric::find($id);
        $model->delete();
        $request->session()->flash('message','Fabric Deleted');
        return redirect('admin/fabric');
    }
    public function status(Request $request,$status,$id)
    {
        $model=Fabric::find($id);
        $model->status=$status;
        $model->save();
       
        return redirect('admin/fabric');
    }
}
