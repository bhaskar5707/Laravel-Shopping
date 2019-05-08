<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function viewBrands()
    {
        $brands = Brand::get();
        return view('admin.brands.view_brands')->with(compact('brands'));
    }
    function getAllBrands()
    {
        $data = Brand::where(['status'=>1])->get();
        echo json_encode($data);
    }
    function addBrand(Request $request)
    {
    	//echo $request->name;die;
    	//echo 'test';die;
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->status =1;
        $brand->save();
        return response()->json(['success'=>'Data is successfully added']);
    }
    function updateBrand(Request $request)
    {
    	//echo 'Test';die;
    	$data= $request->all();
    	//echo $data['id'];die;
    	Brand::where(['id'=>$data['id']])->update(['name'=>$data['name'],'slug'=>$data['slug']]);
        return response()->json(['success'=>'Data is successfully updated']);
    }
    function deleteBrand(Request $request)
    {
        $data= $request->all();
    	//echo $data['id'];die;

	    Brand::where(['id'=>$data['id']])->delete();
	  
	    return response()->json([
	        'success' => 'Record deleted successfully!'
	    ]);
	}
}
