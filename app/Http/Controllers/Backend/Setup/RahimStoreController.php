<?php

namespace App\Http\Controllers\Backend\Setup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RahimStore;
use DB;
class RahimStoreController extends Controller
{
     public function view()
    {
    	$data['allData'] = RahimStore::all(); 
        return view('backend.pages.rahim_store.view-product' , $data);
    }

    public function add()
    {
    	return view('backend.pages.rahim_store.add-product');
    }

    public function store(Request $request){

    	  $this->validate($request,[
            'name' => 'required|max:100|unique:rahim_stores,name',
            'price' => 'required|max:100',
            'expire_date' => 'required'
        ]);

        // Create New Admin
        $data = new RahimStore();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->expire_date =  date('Y-m-d H:i:s');
        $data->save();

        return redirect()->route('setup.rahim_store.view')->with('success', 'data added Successfully !');
        return back();
    }

    public function edit($id){

    	$data['editData'] = RahimStore::find($id);
    	return view('backend.pages.rahim_store.add-product' , $data);
       
    }

    public function update(Request $request , $id){
    	$data = RahimStore::find($id);    	
    	$data->name = $request->name;
    	$data->price = $request->price;
    	$data->expire_date =date_format(date_create($request->expire_date),'Y-m-d');
    	$data->save();
    	return redirect()->route('setup.rahim_store.view')->with('success', 'data Updated Successfully !');
    }

    public function delete(Request $request){
    	$data = RahimStore::find($request->id);
        $data->delete();
        session()->flash('success', 'Data has been deleted !!');
        return back();

    }

    // product front view
    public function front_view(){
    	$data['allData'] = RahimStore::all();
    	return view('backend.pages.rahim_store.front_view' , $data);
    }

}
