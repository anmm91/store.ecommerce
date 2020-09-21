<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class TagsController extends Controller
{
    public function index(){


        $tags=Tag::orderBy('id','desc')->paginate(PAGINTE_COUNT);
        return view('dashboard.tags.index',compact('tags'));
    }//end of index

    public function create(){


        return view('dashboard.tags.create');
    }//end of create

    public function store(TagRequest $request){


        try{


            $tag=new Tag;
            $tag->slug           =       $request->slug;
            $tag->name      =       $request->name;
            // $tag->translateOrNew(app()->getlocale())->name=$request->name;
            $tag->save();

            return redirect()->route('index.tags')->with('success',__('admin/edit_shipping.created'));
        }catch(\Exception $ex){

            return redirect()->route('index.tags')->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of store

    public function edit($id){

        try{

            $tag=Tag::find($id);
            if(!$tag)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));
            return view('dashboard.tags.edit',compact('tag'));
        }catch(\Exception $ex){


            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

        }


    }//end of edit

    public function update(TagRequest $request,$id){

        try{

            $tag=Tag::find($id);
            if(!$tag)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

        // $tag->translateOrNew(app()->getlocale())->name = $request->name;
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect()->route('index.tags')->with('success',__('admin/edit_shipping.updated'));
        }catch(\Exception $ex){

            return redirect()->route('index.tags')->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of update



    public function delete($id){

        try{

            $tag=Tag::find($id);
            if(!$tag)
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));

            $tag->delete();
            return redirect()->back()->with('success',__('admin/edit_shipping.deleted'));

        }catch(\Exception $ex){
            return redirect()->back()->with('error',__('admin/edit_shipping.error_message'));
        }

    }//end of delete
}
