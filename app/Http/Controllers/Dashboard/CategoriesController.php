<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function index(){

        $categories=Category::orderBy('id','desc')->paginate(PAGINTE_COUNT);
        return view('dashboard.categories.index',compact('categories'));
    }//end of index

    public function create(){

        $categories=Category::select('id')->get();
        return view('dashboard.categories.create',compact('categories'));
    }//end of create

    public function store(CategoryRequest $request){


        try{

            if(!$request->has('is_active'))
            $request->request->add(['is_active'=>0]);
            else
            $request->request->add(['is_active'=>1]);

            if($request->type == 1){

                $request->request->add(['parent_id'=>null]);
                $category=new category;
            $category->slug           =       $request->slug;
            $category->is_active      =       $request->is_active;
            $category->translateOrNew(app()->getlocale())->name=$request->name;
            $category->save();
            }else{

                $category=new category;
            $category->slug           =       $request->slug;
            $category->is_active      =       $request->is_active;
            $category->parent_id      =       $request->parent_id;
            $category->translateOrNew(app()->getlocale())->name=$request->name;
            $category->save();

            }




            return redirect()->route('index.categories')->with('success',__('admin/edit_shipping.created'));
        }catch(\Exception $ex){

            return redirect()->route('index.categories')->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of store

    public function edit($id){

        try{

            $category=Category::find($id);
            if(!$category)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));
            return view('dashboard.categories.edit',compact('category'));
        }catch(\Exception $ex){

            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

        }


    }//end of edit

    public function update(CategoryRequest $request,$id){

        try{

            $category=Category::find($id);
            if(!$category)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

        if(!$request->has('is_active'))
        $request->request->add(['is_active'=>0]);
        else
        $request->request->add(['is_active'=>1]);

        // $category->translateOrNew(app()->getlocale())->name = $request->name;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->is_active = $request->is_active;
        $category->save();

        return redirect()->route('index.main_categories')->with('success',__('admin/edit_shipping.updated'));
        }catch(\Exception $ex){

            return redirect()->route('index.main_categories')->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of update

    public function activate($id){

        $category=Category::find($id);
        if(!$category)
        return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));
        ($category->is_active == 1) ? $category->update(['is_active'=> 0 ])  : $category->update(['is_active'=> 1 ]) ;

        return redirect()->back()->with('success',__('admin/edit_shipping.activated'));

    }//end of activate

    public function delete($id){

        try{

            $category=Category::find($id);
            if(!$category)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

            $category->delete();
            return redirect()->back()->with('success',__('admin/edit_shipping.deleted'));

        }catch(\Exception $ex){
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of delete
}
