<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Banner;
use App\Brand;
class IndexController extends Controller
{
    function index()
    {
    	//In Ascending order (by default)
    	$productAll = Product::get();
    	//In descending order
    	$productAll = Product::orderBy('id','DESC')->get();
    	//In random order
    	$productAll = Product::InRandomOrder('status',1)->get();


        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

    	//Get All category and subcategory without relationship
    	/*$category = Category::where(['parent_id'=>0])->get();
    	$category_menu="";
    	foreach ($category as $cat) {
	    $category_menu .="<div class='panel-heading'>
                  <h4 class='panel-title'>
                    <a data-toggle='collapse' data-parent='accordian' href='#".$cat->id."'>
                      <span class='badge pull-right'><i class='fa fa-plus'></i></span>
                      ".$cat->name."
                    </a>
                  </h4>
                </div>
                <div id='".$cat->id."' class='panel-collapse collapse'>
                  <div class='panel-body'>
                    <ul>";
                    $sub_category = Category::where(['parent_id'=>$cat->id])->get();
		    		foreach ($sub_category as $subcat) {
		    			$category_menu .="<li><a href='".$subcat->url."'>".$subcat->name." </a></li>";
		    		}
                      
                    $category_menu .="</ul>
                  </div>
                </div>
                ";
    		
    	}*/

        $productBuyoneGetOne = Product::where('buyonegetone',1)->orderBy('id','DESC')->get();
        $productExclusicve = Product::where('exclusicve',1)->orderBy('id','DESC')->get();

        //Grocery & Staples Special
        $subCategories = Category::where(['parent_id'=>7])->get();
        //$cat_ids = "";
        foreach ($subCategories as $key=>$subcat) 
        {
            $cat_ids2[] =$subcat->id;
        }
        $gands_specials= Product::where(['category_id'=>7])->orWhereIn('category_id',$cat_ids2)->get();

        $banners = Banner::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
    	return view('index')->with(compact('productAll','category_menu','categories','banners','productBuyoneGetOne','productExclusicve','gands_specials','brands'));
    }
}
