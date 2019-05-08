<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use DB;
use App\Country;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
	public function userLoginRegister()
	{
		return view('users.login_register');
	}
	public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    return redirect()->back()->with('flash_message_error','Your account is not activated! Please confirm your email to activate.');    
                }
                Session::put('frontSession',$data['email']);

                if(!empty(Session::get('session_id'))){
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id',$session_id)->update(['user_email' => $data['email']]);
                }

                return redirect('/cart');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid Username or Password!');
            }
        }
    }
    public function register(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$data = $request->all();
    		//echo "<pre>";print_r($data);die;
    		//Check if user already exits
    		$usersCount = User::where('email',$data['email'])->count();
    		if($usersCount > 0)
    		{
    			return redirect()->back()->with('flash_message_error','Email already exists');
    		}
    		else
    		{
    			$user = new User;
    			$user->name= $data['name'];
    			$user->email= $data['email'];
    			$user->admin=0;
    			$user->password= bcrypt($data['password']);
    			$user->save();
    			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    				Session::put('frontSession',$data['email']);

                    if(!empty(Session::get('session_id'))){
                        $session_id = Session::get('session_id');
                        DB::table('cart')->where('session_id',$session_id)->update('user_email',$data['email']);
                    }
    				return redirect('cart');
    			}
    		}
    	}
    	return view('users.login_register');
    }

    public function account(Request $request)
    {	
    	$user_id = Auth::user()->id;//echo $user_id;die;
    	$userDetails = User::find($user_id);
    	$countries = Country::get();
    	if($request->isMethod('post'))
    	{
    		$data = $request->all();

            if(empty($data['name']))
            {
            	return redirect()->back()->with('flash_message_error','Please enter your name to update your account details!');
            }
            if(empty($data['address']))
            {
            	$data['address']='';
            }
            if(empty($data['city']))
            {
            	$data['city']='';
            }
            if(empty($data['state']))
            {
            	$data['state']='';
            }
            if(empty($data['country']))
            {
            	$data['country']='';
            }
            if(empty($data['pincode']))
            {
            	$data['pincode']='';
            }
            if(empty($data['mobile']))
            {
            	$data['mobile']='';
            }

    		$user = User::find($user_id);
    		$user->name = $data['name'];
    		$user->address = $data['address'];
    		$user->city = $data['city'];
    		$user->state = $data['state'];
    		$user->country = $data['country'];
    		$user->pincode = $data['pincode'];
    		$user->mobile = $data['mobile'];
    		$user->save();
    		return redirect()->back()->with('flash_message_success','Your account details has been successfully updated');
    	}
    	return view('users.account')->with(compact('countries','userDetails'));
    }

    public function logout()
    {
    	Auth::logout();
    	Session::forget('frontSession');
        Session::forget('session_id');
    	return redirect('/');
    }

    function checkEmail(Request $request)
    {
    	$usersCount = User::where('email',$data['email'])->count();
    	if($usersCount>0){
    		echo "false";
    	}
    	else
    	{
    		echo "Success";die;
    	}
    }
    function chkUserPassword(Request $request)
    {
    	$data= $request->all();
    	//echo "<pre>";print_r($data);
    	$current_password = $data['current_pwd'];
    	$user_id = Auth::User()->id;
    	$check_password = User::where('id',$user_id)->first();
    	if(Hash::check($current_password,$check_password->password)){
    		echo 'true';die;
    	}else
    	{
    		echo 'false';die;
    	}
    }
    function updatePassword(Request $request)
    {
        if($request->isMethod('post'))
    	{
    		$data = $request->all(); //echo "<pre>";print_r($data);die;
    		$check_password = User::where(['email'=>Auth::user()->email])->first();
    		$current_password = $data['current_pwd'];
    		if(Hash::check($current_password,$check_password->password))
            {
            	$password = bcrypt($data['new_pwd']);
            	User::where('id',Auth::User()->id)->update(['password'=>$password]);
            	return redirect()->back()->with('flash_message_success','Your account password has been successfully updated');
            }
            else
            {
            	return redirect()->back()->with('flash_message_success','Incorrect current password!');
            }
    	}
    }

    function viewUsers(){
        $users = User::get();
        return view('admin.users.view_users')->with(compact('users'));
    }
}
