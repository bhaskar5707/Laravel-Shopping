<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function login(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$data = $request->input();
            $adminCount = Admin::where(['username'=>$data['username'],'password'=>md5($data['password']),'status'=>1])->count();
    		if($adminCount > 0)
    		{
                Session::put('adminSession',$data['username']);
    			return redirect('/admin/dashboard');
    		}
    		else
    		{
    			return redirect('/admin')->with('flash_message_error','Invalid username or password');
    		}
    	}
    	return view('admin.admin_login');
    }
    function dashboard()
    {
    	//secure with session
    	/*if(Session::has('adminSession'))
    	{
    	    return view('admin.dashboard');
    	}
    	else
		{
			return redirect('/admin')->with('flash_message_error','Please login to access admin pannel');
		}*/
		return view('admin.dashboard');
    }
    function settings()
    {
        $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();
		return view('admin.settings')->with(compact('adminDetails'));
    }
    function chkPassword(Request $request)
    {
    	echo 'Test';die;
        $data = $request->all();
        $adminCount = Admin::where(['username'=>Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
        if($adminCount ==1)
        {
        	echo 'true';die;
        }
        else
        {
        	echo 'false';die;
        }
    }

    function updatePassword(Request $request)
    {
        if($request->isMethod('post'))
    	{
    		$data = $request->all();

            $adminCount = Admin::where(['username'=>Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();

    		if($adminCount ==1)
            {
            	$password = md5($data['new_pwd']);
            	Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
            	return redirect('/admin/settings')->with('flash_message_success','Password update successfully!');
            }
            else
            {
            	return redirect('/admin/settings')->with('flash_message_error','Incorrect current password!');
            }
    	}
    }
    function logout()
    {
    	Session::Flush();
    	return redirect('/admin')->with('flash_message_success','Logout succssful');
    }
}
