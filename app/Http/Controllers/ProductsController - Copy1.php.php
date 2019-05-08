<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Image;
use App\Category;
use App\Product;
use App\Country;
use App\DeliveryAddress;
use App\ProductsAttribute;
use App\ProductsImage;
use App\User;
use App\Order;
use App\OrdersProduct;
use DB;
use Session;
use App\Coupon;
class ProductsController extends Controller
{
    public function addProduct(Request $request)
    {
        //Intervention package for image in laravel php composer.phar require intervention/image
        if($request->isMethod('post'))
        {
            $data= $request->all();
            //echo "<pre>";print_r($data);die;
            if(empty($data['category_id']))
            {
                return redirect()->back()->with('flash_message_error','Category is missing');
            }
            $product = new Product;
            $product->category_id=$data['category_id'];
            $product->product_name=$data['product_name'];
            $product->product_code=$data['product_code'];
            $product->product_color=$data['product_color'];
            $product->price=$data['price'];
           
            if(!empty($data['description']))
            {
                $product->description=$data['description'];
            }
            else
            {
                $product->description='';
            }
            if(!empty($data['care']))
            {
                $product->care=$data['care'];
            }
            else
            {
                $product->care='';
            }
            //Upload image
            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    $product->image = $filename;
                }
            }
            if(empty($data['status']))
            {
                $status=0;
            }
            else
            {
                $status=1;
            }
            $product->status= $status;
            $product->save();
            //return redirect()->back()->with('flash_message_success','Product has been added successfully');
            return redirect('/admin/view-products')->with('flash_message_success','Product added successfully');
        }

        //Display category start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat) 
        {
            $categories_dropdown .="<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) 
            {
                $categories_dropdown .="<option value='".$sub_cat->id."'>&nbsp;-->&nbsp;".$sub_cat->name."</option>";

                $sub2_categories = Category::where(['parent_id'=>$sub_cat->id])->get();
                foreach ($sub2_categories as $sub_cat2) 
                {
                     $categories_dropdown1 .="<option value='".$sub_cat2->id."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--->>&nbsp;&nbsp;".$sub_cat2->name."</option>";
                }
            }
        }
        //Display category end
        return view('admin.products.add-product')->with(compact('categories_dropdown'));
    }
    function editProduct(Request $request , $id = null)
    {
        if($request->isMethod('post'))
        {
            $data= $request->all();
            //print_r($data);die;
            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                }
                
            }
            else
            {
                $filename = $data['current_image'];
            }
            if(empty($data['description']))
            {
                $data['description']='';
            }
            if(empty($data['care']))
            {
                $data['care']='';
            }
            if(empty($data['status']))
            {
                $status=0;
            }
            else
            {
                $status=1;
            }
            
            Product::where(['id'=>$id])->update(['product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'price'=>$data['price'],'description'=>$data['description'],'care'=>$data['care'],'image'=>$filename,'status'=>$status]);
            return redirect()->back()->with('flash_message_success','Product has been update successfully');
        }
        $productDetails = Product::where(['id'=>$id])->first(); 
        //Display category start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat) 
        {
            if($cat->id==$productDetails->category_id)
            {
                $selected="selected";
            }
            else
            {
                $selected="";
            }
            $categories_dropdown .="<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) 
            {
                if($sub_cat->id==$productDetails->category_id)
                {
                    $selected="selected";
                }
                else
                {
                    $selected="";
                }
                $categories_dropdown .="<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        //Display category end
        return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown')); 
    }
    function viewProducts()
    {
        /*
        Product list without relationship
        $products = Product::orderby('id','DESC')->get();
        $products = json_decode(json_encode($products));
        foreach($products as $key => $val)
        {
            $category_name = Category::where(['id'=>$val->category_id])->first();
            //echo "<pre>";print_r($category_name);die;
            //https://www.youtube.com/watch?v=njzUr__aEWo
            $products[$key]->category_name=$category_name->name;
        }
        return view('admin.products.view-products')->with(compact('products'));*/

        $products = Product::with(['category'])->orderby('id','DESC')->get();
        return view('admin.products.view-products', compact('products'));
    }

    //https://cdnjs.com/libraries/bootstrap-sweetalert
    //https://sweetalert2.github.io/

    function deleteProduct($id= null)
    {
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product has been delete successfully');
    }
    function deleteProductImage($id= null)
    {
        $productImage = Product::where(['id'=>$id])->first();
        //echo $productImage->image;die;
        //Get product image path
        $large_image_path="images/backend_images/products/large/";
        $medium_image_path="images/backend_images/products/medium/";
        $small_image_path="images/backend_images/products/small/";
        //echo $large_image_path.$productImage->image;die;
        if(file_exists($large_image_path.$productImage->image)){
           //echo $large_image_path.$productImage->image;die;
           unlink($large_image_path.$productImage->image);
        }
        if(file_exists($medium_image_path.$productImage->image)){
           unlink($medium_image_path.$productImage->image);
        }
        if(file_exists($small_image_path.$productImage->image)){
           unlink($small_image_path.$productImage->image);
        }
        //Product::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success','Product image has been delete successfully');
    }
    function deleteAttribute($id= null)
    {
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product attribute has been delete successfully');
    }
    function addAttributes(Request $request ,$id=null)
    {
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        //$productDetails= json_decode(json_encode($productDetails));
        if($request->isMethod('post'))
        {
            $data= $request->all();
            //echo "<pre>";print_r($data);die;
            foreach ($data['sku'] as $key => $val) 
            {
                if(!empty($val))
                {
                    //Prevent duplicate SKU Check
                    $attrCountSKU =ProductsAttribute::where('sku',$val)->count();
                    if($attrCountSKU > 0)
                    {
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error','SKU already exists! Please add another SKU');
                    }

                   //Prevent duplicate SIZE Check
                    $attrCountSizes =ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountSizes > 0)
                    {
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error',''.$data['size'][$key]. ' Size already exists! for this product Please add another Size');
                    }

                    $attribute = new ProductsAttribute;
                    $attribute->product_id= $id;
                    $attribute->sku=$val;
                    $attribute->size=$data['size'][$key];
                    $attribute->price=$data['price'][$key];
                    $attribute->stock=$data['stock'][$key];
                    $attribute->save();
                }
            }
            return redirect('/admin/add-attributes/'.$id)->with('flash_message_success','Product attribute has been added successfully');
        }
        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }

    function editAttributes(Request $request ,$id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();    
            //echo "<pre>";print_r($data);die;
            foreach($data['idAttr'] as $key=>$attr){
                ProductsAttribute::where(['id'=>$data['idAttr'][$key]])->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
            }
            return redirect()->back()->with('flash_message_success','Product attribute has been update successfully');
        }
    }

    function deleteAddImage($id= null)
    {
        $productImage = ProductsImage::where(['id'=>$id])->first();
        //echo $productImage->image;die;
        //Get product image path
        $large_image_path="images/backend_images/products/large/";
        $medium_image_path="images/backend_images/products/medium/";
        $small_image_path="images/backend_images/products/small/";
        //echo $large_image_path.$productImage->image;die;
        if(file_exists($large_image_path.$productImage->image)){
           //echo $large_image_path.$productImage->image;die;
           unlink($large_image_path.$productImage->image);
        }
        if(file_exists($medium_image_path.$productImage->image)){
           unlink($medium_image_path.$productImage->image);
        }
        if(file_exists($small_image_path.$productImage->image)){
           unlink($small_image_path.$productImage->image);
        }
        ProductsImage::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product image has been delete successfully');
    }

    function addImages(Request $request ,$id=null)
    {
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        if($request->isMethod('post'))
        {
            $data = $request->all(); // echo "<pre>";print_r($data);die;
            if($request->hasFile('image'))
            {
                $files = $request->file('image');
                foreach ($files as $file) 
                {
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $fileName= rand(111,99999).'.'.$extension;
                    $large_image_path="images/backend_images/products/large/".$fileName;
                    $medium_image_path="images/backend_images/products/medium/".$fileName;
                    $small_image_path="images/backend_images/products/small/".$fileName;
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600,600)->save($medium_image_path);
                    Image::make($file)->resize(300,300)->save($small_image_path);
                    $image->image=$fileName;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }
            }
            return redirect('admin/add-images/'.$id)->with('flash_message_success','Product Images Add successfully');
        }
        $productImages = ProductsImage::where(['product_id'=>$id])->get();
        return view('admin.products.add_images')->with(compact('productDetails','productImages'));
    }


    public function products($url=null)
    {
       //Show 404 page if url does not exits
        $countCategory = Category::where(['url'=>$url,'status'=>1])->count();
        if($countCategory == 0)
        {
            abort(404);
        }
       //Get all categories and subcategories
       $categories = Category::with('categories')->where(['parent_id'=>0])->get();
       $categoryDetails = Category::where(['url'=>$url])->first();

       if($categoryDetails->parent_id==0)
       {
           // If url is main category url
           $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
           //$cat_ids = "";
           foreach ($subCategories as $key=>$subcat) {
               
               $cat_ids[] =$subcat->id;
           }
           //echo $cat_ids;die;
           $productsAll= Product::whereIn('category_id',$cat_ids)->where('status',1)->get();
       }
       else
       {
           //if url is sub category url
           $productsAll= Product::where(['category_id'=>$categoryDetails->id])->get();
       }

       
       return view('products.listing')->with(compact('categories','categoryDetails','productsAll'));
    }

    public function product($id= null)
    {
        // Show 404 page if product is disabled
        $productCount = Product::where(['id'=>$id,'status'=>'1'])->count();
        if($productCount == 0)
        {
            abort(404);
        }
        //$productDetails = Product::where('id',$id)->first();
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        $productDetails = json_decode(json_encode($productDetails));
        //echo "<pre>";print_r($productDetails);die;
 
        $relatedProducts = Product::where('id','!=',$id)->where(['category_id'=>$productDetails->category_id])->get();
        /*$relatedProducts = json_decode(json_encode($relatedProducts ));
        echo '<pre>';print_r($relatedProducts);die;*/
        /*foreach ($relatedProducts->chunk(3) as $chunk) {
           foreach($chunk as $item)
           {
               echo $item.'<br>';
           }
        }
        die;*/
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        //Get product alternate image
        $productAltImages=ProductsImage::where('product_id',$id)->get();
        /*$productAltImages=json_decode(json_encode($productAltImages));
        echo "<pre>";print_r($productAltImages);die;*/

        $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');

        return view('products.detail')->with(compact('productDetails','categories','productAltImages','total_stock','relatedProducts'));
    }
    public function getProductPrice(Request $request)
    {
        $data = $request->all();
        //echo "<pre>";print_r($data);
        $proArr = explode("-",$data['idSize']);
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price;
        echo '#';
        echo $proAttr->stock;
    }


    function addtocart(Request $request)
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');

        $data = $request->all();
        //echo "<pre>";print_r($data);die;
        //if(empty($data['user_email']))

        //Check product stock is avaliable or not
        $product_size = explode("-",$data['size']);
        $getProductStock = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$product_size[1]])->first();
        //echo $getProductStock->stock;die;
        if($getProductStock->stock < $data['quantity']){
            return redirect()->back()->with('flash_message_error','required quantity is not avaliable');
        }

        if(empty(Auth::user()->email))
        {
            $data['user_email']="";
        }
        else
        {
            $data['user_email']=Auth::user()->email;
        }
        /*if(empty($data['session_id']))
        {
            $data['session_id']="";
        }*/

        

        $session_id = Session::get('session_id');
        if(empty($session_id)){
        $session_id = str_random(40);
        Session::put('session_id',$session_id);
        }

        $sizeArr = explode("-",$data['size']);
        $sizeIDArr= explode('-',$data['size']);
        $product_size = $sizeIDArr[1];

        /*$countProduct=DB::table('cart')->where(['product_id'=>$data['product_id'],'product_color'=>$data['product_color'],'size'=>$sizeArr[1],'session_id'=>$session_id])->count();*/

        if(empty(Auth::check())){
            $countProduct=DB::table('cart')->where(['product_id'=>$data['product_id'],'product_color'=>$data['product_color'],'size'=>$product_size,'session_id'=>$session_id])->count();
            if($countProduct>0)
            {
                return redirect()->back()->with('flash_message_error','Product  allready exists');
            }
        }else{
             $countProduct=DB::table('cart')->where(['product_id'=>$data['product_id'],'product_color'=>$data['product_color'],'size'=>$product_size,'user_email'=>Auth::User()->email])->count();
                    if($countProduct>0)
                    {
                        return redirect()->back()->with('flash_message_error','Product  allready exists');
                    }
            }

        
        $getSKU = ProductsAttribute::select('sku')->where(['product_id'=>$data['product_id'],'size'=>$sizeArr[1]])->first();

        DB::table('cart')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$getSKU->sku,'product_color'=>$data['product_color'],'price'=>$data['price'],'size'=>$sizeArr[1],'quantity'=>$data['quantity'],'user_email'=>$data['user_email'],'session_id'=>$session_id]);
        return redirect('cart')->with('flash_message_success','Product has been added in cart!');
       


    }

    function cart()
    {
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }else{
        $session_id = Session::get('session_id');
        $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }

        foreach ($userCart as $key => $product) {
           $productDetails= Product::where('id',$product->product_id)->first();
           $userCart[$key]->image = $productDetails->image;
        }
        //echo "<pre>";print_r($userCart);
        return view('products.cart')->with(compact('userCart'));
    }
    function deleteCartProduct($id = null)
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');
        
        DB::table('cart')->where('id',$id)->delete();
        return redirect('cart')->with('flash_message_success','Product has been deleted from cart!');
    }
    function updateCartQuantity($id=null , $quantity=null)
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');

        $getCartDetails = DB::table('cart')->where('id',$id)->first();
        $getAttributeStock = ProductsAttribute::where('sku',$getCartDetails->product_code)->first();
        echo $getAttributeStock->stock;echo "--";
        $updated_quantity = $getCartDetails->quantity+$quantity;
        if($getAttributeStock->stock >= $updated_quantity)
        {
        DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
        return redirect('cart')->with('flash_message_success','Product quantity has been update successfully!');
        }else{
            return redirect('cart')->with('flash_message_error','Required Product Quantity in not avaliable!');
        }
    }

    function applyCoupon(Request $request)
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');

        $data = $request->all();
        $couponCount = Coupon::where('coupon_code',$data['coupon_code'])->count();
        if($couponCount == 0)
        {
            return redirect()->back()->with('flash_message_error','Coupon code in not valid');
        }
        else
        {
            $couponDetails = Coupon::where('coupon_code',$data['coupon_code'])->first();
            if($couponDetails->status == 0)
            {
                return redirect()->back()->with('flash_message_error','Coupon code in not active');
            }
            //If Coupon code is expire
            $expire_date = $couponDetails->expiry_date;
            $current_date = date('Y-m-d');
            if($expire_date < $current_date)
            {
                return redirect()->back()->with('flash_message_error','Coupon code expire');
            }
            //Coupon is valid for discount
            //Get Cart total amount
            $session_id = Session::get('session_id');
           
            if(Auth::check()){
                $user_email = Auth::user()->email;
                $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
            }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
            }

            $total_amount = 0;
            foreach($userCart as $item)
            {
                $total_amount = $total_amount + ($item->price*$item->quantity);
            }
            //Check if amount type is fixed or percentage
            if($couponDetails->amount_type=="Fixed")
            {
                $couponAmount = $couponDetails->amount;
            }else
            {
                $couponAmount = $total_amount * ($couponDetails->amount/100);
            }
            //Add coupon code & amount in session
            Session::put('couponAmount',$couponAmount);
            Session::put('couponCode',$data['coupon_code']);
             return redirect()->back()->with('flash_message_success','Coupon code successfully applied . You are availing discount');
        }
    }

    function checkout(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);
        $countries = Country::get();

        //Check if shipping address exists
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        $shippingDetails = array();
        if($shippingCount > 0){
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }

        //Update cart table with user email
        $session_id = Session::get('session_id');
        DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);
        
        if($request->isMethod('post'))
        {
            $data = $request->all();
            if(empty($data['billing_name']) || empty($data['billing_address'])|| empty($data['billing_city'])|| empty($data['billing_state'])|| empty($data['billing_country'])|| empty($data['billing_pincode'])|| empty($data['billing_mobile'])|| empty($data['shipping_name'])|| empty($data['shipping_address'])|| empty($data['shipping_city'])|| empty($data['shipping_state'])|| empty($data['shipping_country'])|| empty($data['shipping_pincode'])|| empty($data['shipping_mobile'])){

                return redirect()->back()->with('flash_message_error','Please fill all fields to continue!');
            }

            //Update User Details
            User::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],'city'=>$data['billing_city'],'state'=>$data['billing_state'],'pincode'=>$data['billing_pincode'],'country'=>$data['billing_country'],'mobile'=>$data['billing_mobile']]);

            if($shippingCount > 0){
                //Update Shipping address
            DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'pincode'=>$data['shipping_pincode'],'country'=>$data['shipping_country'],'mobile'=>$data['shipping_mobile']]);
            }else{
                //Add New Shipping Address
                $shipping = new DeliveryAddress;
                $shipping->user_id = $user_id;
                $shipping->user_email = $user_email;
                $shipping->name = $data['shipping_name'];
                $shipping->address = $data['shipping_address'];
                $shipping->city = $data['shipping_city'];
                $shipping->state = $data['shipping_state'];
                $shipping->pincode = $data['shipping_pincode'];
                $shipping->country = $data['shipping_country'];
                $shipping->mobile = $data['shipping_mobile'];
                $shipping->save();
            }
            //echo 'Move';die;
            return redirect()->action('ProductsController@orderReview');
            //return redirect('order-review');
        }

        return view('products.checkout')->with(compact('userDetails','countries','shippingDetails'));
    }

    function orderReview()
    {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::where('id',$user_id)->first();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        //$shippingDetails = json_decode(json_encode($shippingDetails));
        $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        foreach ($userCart as $key => $product) {
           $productDetails= Product::where('id',$product->product_id)->first();
           $userCart[$key]->image = $productDetails->image;
        }
        return view('products.order_review')->with(compact('userDetails','shippingDetails','userCart'));
    }

    function placeOrder(Request $request){
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            //echo "<pre>";print_r($data);

            //Get shipping address of User
            $shippingDetails = DeliveryAddress::where(['user_email'=>$user_email])->first();

            if(empty(Session::get('couponCode')))
            {
                $coupon_code='';
            }
            else
            {
                $coupon_code=Session::get('couponCode');
            }
            if(empty(Session::get('couponAmount')))
            {
                $coupon_amount='';
            }
            else
            {
                $coupon_amount=Session::get('couponAmount');
            }

            $order = New Order;
            $order->user_id = $user_id;
            $order->user_email = $shippingDetails->user_email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->state = $shippingDetails->state;
            $order->pincode = $shippingDetails->pincode;
            $order->country = $shippingDetails->country;
            $order->shipping_charges = $shippingDetails->mobile;
            $order->coupon_code = $coupon_code;
            $order->coupon_amount = $coupon_amount;
            $order->orders_status = 'New';
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();


            $order_id = DB::getPdo()->lastInsertId();
            $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();
            foreach($cartProducts as $pro)
            {
                $cartPro = New OrdersProduct;
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->product_code;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_color = $pro->product_color;
                $cartPro->product_size = $pro->size;
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();
            }


            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);
            if($data['payment_method'] =='COD'){
                //COD-Redirect cod thank you page
                return redirect('/thanks');
            }else{
                //Paypal-Redirect to paypal thank you page
                return redirect('/paypal');
            }

        }
    }

    function thanks(Request $request)
    {
        $user_email = Auth::user()->email;
        DB::table('cart')->where('user_email',$user_email)->delete();
        return view('orders.thanks');
    }

    function paypal(Request $request)
    {
        $user_email = Auth::user()->email;
        DB::table('cart')->where('user_email',$user_email)->delete();
        return view('orders.paypal');
    }
    function thanksPaypal(){
        return view('orders.thanks_paypal');
    }
    function cancelPaypal(){
        return view('orders.cancel_paypal');
    }
    function userOrders(){
        $user_id = Auth::user()->id;
        $orders = Order::with('orders')->where('user_id',$user_id)->orderBy('id','DESC')->get();
        return view('orders.users_orders')->with(compact('orders'));
    }
    function userOrderDetails($order_id){
        $user_id = Auth::user()->id;
        $orderDetails = Order::with('orders')->where('id',$order_id)->orderBy('id','DESC')->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        //echo "<pre>";print_r($orderDetails);die;
        return view('orders.users_order_details')->with(compact('orderDetails'));
    }

    //Admin view orders
    function viewOrders(){
        $orders = Order::with('orders')->orderby('id','desc')->get();
        $orders = json_decode(json_encode($orders));
        return view('admin.orders.view_orders')->with(compact('orders'));
    }

    function viewOrderDetails($order_id=""){
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        $user_id = $orderDetails->user_id;
        $userDetails= User::where('id',$user_id)->first();
        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails'));
    }

    function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            Order::where('id',$data['order_id'])->update(['orders_status'=>$data['order_status']]);
            return redirect()->back()->with('flash_message_success','Order status has been updated successfully');
        }
    }

    function searchProducts(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $categories = Category::with('categories')->where(['parent_id'=>0])->get();
            $search_product = $data['product'];
            $productsAll = Product::where('product_name','like','%'.$search_product.'%')->orwhere('product_code',$search_product)->where('status',1)->get();
            return view('products.listing')->with(compact('categories','productsAll','search_product'));
        }
    }
}
