<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    public function index(){

        $brands=Brand::orderBy('id','desc')->paginate(PAGINTE_COUNT);

        return view('dashboard.brands.index',compact('brands'));
    }//end of index

    public function create(){


        return view('dashboard.brands.create');
    }//end of create

    public function store(BrandRequest $request){

        try{

            if(!$request->has('is_active'))
            $request->request->add(['is_active'=>0]);
            else
            $request->request->add(['is_active'=>1]);
            if($request->file('photo'))
            $file_path=uploadImage('brands',$request->photo);
            $brand=new Brand;
            $brand->photo           =       $file_path;
            $brand->is_active      =       $request->is_active;
            $brand->translateOrNew(app()->getlocale())->name=$request->name;
            $brand->save();

            return redirect()->route('index.brands')->with('success',__('admin/edit_shipping.created'));
        }catch(\Exception $ex){

            return redirect()->route('index.brands')->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of store
    public function edit($id){

        try{

            $brand=Brand::find($id);
            if(!$brand)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));
            return view('dashboard.brands.edit',compact('brand'));
        }catch(\Exception $ex){


            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

        }


    }//end of edit

    public function update(BrandRequest $request,$id){

        try{

            $brand=Brand::find($id);
            if(!$brand)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

        if(!$request->has('is_active'))
        $request->request->add(['is_active'=>0]);
        else
        $request->request->add(['is_active'=>1]);

        DB::beginTransaction();
        if($request->file('photo')){

           return  Storage::disk('brands')->delete('/'.$brand->photo);
            $file_path=uploadImage('brands',$request->photo);
            $brand->update([
                'photo'=>$file_path,
            ]);
        }

        // $category->translateOrNew(app()->getlocale())->name = $request->name;
        $brand->name = $request->name;

        $brand->is_active = $request->is_active;
        $brand->save();

        DB::commit();
        return redirect()->route('index.brands')->with('success',__('admin/edit_shipping.updated'));
        }catch(\Exception $ex){

            DB::rollback();
            return redirect()->route('index.brands')->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of update
}
