<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;

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
}
