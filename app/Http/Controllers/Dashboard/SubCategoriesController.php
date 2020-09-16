<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;

class SubCategoriesController extends Controller
{
    public function index(){


        $categories=Category::orderBy('id','desc')->child()->paginate(PAGINTE_COUNT);
        return view('dashboard.subcategories.index',compact('categories'));
    }//end of index

    public function create(){

          $categories=Category::parent()->orderBy('id','desc')->get();
        return view('dashboard.subcategories.create',compact('categories'));
    }//end of create
    public function store(SubCategoryRequest $request){

        try{

            if(!$request->has('is_active'))
            $request->request->add(['is_active'=>0]);
            else
            $request->request->add(['is_active'=>1]);

            $category=new category;
            $category->slug           =       $request->slug;
            $category->is_active      =       $request->is_active;
            $category->parent_id      =       $request->parent_id;
            $category->translateOrNew(app()->getlocale())->name=$request->name;
            $category->save();

            return redirect()->route('index.sub_categories')->with('success',__('admin/edit_shipping.created'));
        }catch(\Exception $ex){

            return redirect()->route('index.sub_categories')->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of create
    public function edit($id){

        try{

            $category=Category::find($id);
            if(!$category)
            return redirect()->route('index.sub_categories')->with('error',__('admin/edit_shipping.error_message'));

            $categories=Category::parent()->get();
            return view('dashboard.subcategories.edit',compact('category','categories'));
        }catch(\Exception $ex){

            return redirect()->route('index.sub_categories')->with('error',__('admin/edit_shipping.error_message'));

        }

    }//end of edit
    public function update(SubCategoryRequest $request,$id){

        try{

            $category=Category::find($id);
            if(!$category)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

        if(!$request->has('is_active'))
        $request->request->add(['is_active'=>0]);
        else
        $request->request->add(['is_active'=>1]);

        $category->translateOrNew(app()->getlocale())->name = $request->name;
        $category->slug = $request->slug;
        $category->is_active = $request->is_active;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()->route('index.sub_categories')->with('success',__('admin/edit_shipping.updated'));
        }catch(\Exception $ex){

            return redirect()->route('index.sub_categories')->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of update
    public function delete($id){

        try{

            $category=Category::find($id);
            if(!$category)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

            $category->delete();
            return redirect()->route('index.sub_categories')->with('success',__('admin/edit_shipping.deleted'));

        }catch(\Exception $ex){
            return redirect()->route('index.sub_categories')->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of delete

    public function activate($id){

        $category=Category::find($id);
        if(!$category)
        return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));
        ($category->is_active == 1) ? $category->update(['is_active'=> 0 ])  : $category->update(['is_active'=> 1 ]) ;

        return redirect()->route('index.sub_categories')->with('success',__('admin/edit_shipping.activated'));

    }//end of activate

    public function convertToParentOrChild($id){

        $category=Category::find($id);
        if(!$category)
        return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));
        if($category->parent_id != null)
        $category->update(['parent_id'=>null]);

        return redirect()->route('index.sub_categories')->with('success',__('admin/edit_shipping.activated'));
    }//end of conversion between parent category and child category
}
