<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    function manageCategoryStructure()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('name','id')->all();
        return view('admin.categories.categorytreeview',compact('categories','allCategories'));
    }

    
    function addCategory(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data= $request->all();
            if(empty($data['status']))
            {
                $status=0;
            }
            else
            {
                $status=1;
            }
            $category = new Category;
            $category->name=$data['category_name'];
            $category->description=$data['description'];
            $category->parent_id=$data['parent_id'];
            $category->url=$data['url'];
            $category->status=$status;
            $category->save();
            return redirect('/admin/add-category')->with('flash_message_success','Category added successfully');
        }
        /*$levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category')->with(compact('levels'));*/
        $levels = Category::where(['status'=>1])->get();
        return view('admin.categories.add_category')->with(compact('levels'));
    }

    function editCategory(Request $request , $id = null)
    {
        if($request->isMethod('post'))
        {
            $data= $request->all();
            if(empty($data['status']))
            {
                $status=0;
            }
            else
            {
                $status=1;
            }
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url'],'parent_id'=>$data['parent_id'],'status'=>$status]);
            return redirect('/admin/view-categories')->with('flash_message_success','Category updated successfully');
        }
        $categoryDetails = Category::where(['id'=>$id])->first(); 
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels')); 
    }
    function viewCategories()
    {
        $categories = Category::get();
        //$categories = json_decode(json_decode($categories));
        //echo '<pre>';
        //print_r($categories);die;
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
    function deleteCategory(Request $request , $id = null)
    {
        if(!empty($id))
        {
            Category::where(['id'=>$id])->delete();
            return redirect('/admin/view-categories')->with('flash_message_success','Category deleted successfully');
        }
    }
}
