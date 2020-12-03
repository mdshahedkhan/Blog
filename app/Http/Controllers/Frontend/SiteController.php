<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;


class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function singlePost()
    {
        $allPost = Post::with('users')->paginate(4);
        return view('frontend.single-post',compact('allPost'));
    }

    public function loginShow()
    {
        return view('frontend.login');
    }

    public function registerShow()
    {
        return view('frontend.register');
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|unique:users',
            'email' => 'required|email|min:4|unique:users',
            'password' => 'required|min:6|same:ConfirmPassword',
            'image' => 'required'
        ]);
        $image = $request->file('image');
        $ProfileImage = rand(1111, 99999999) . date('Ymdhis') . rand(111111, 999999999999) . '.' . $image->getClientOriginalExtension();
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' => $ProfileImage
            ]);
            if ($image->isValid()) {
                $image->storeAs('Profile', $ProfileImage);
            }
            session()->flash('type', 'success');
            session()->flash('message', 'User Register Successfully!');
        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', $exception->getMessage());
        }
        return redirect()->back();
    }

    public function login(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        try {
            $data = array('email'=>$request,'password'=>$request->password);
            if (auth()->attempt($data)){
                return redirect()->route('admin.dashboard');
            }else{
                session()->flash('type','danger');
                session()->flash('message','These credentials do not match our records');
            }
            return redirect()->back();
        }catch (Exception $exception){
            session('type','danger');
            session('message',$exception->getMessage());
            return redirect()->back();
        }
    }
    public function Logout()
    {
        auth()->logout();
        return redirect(route('user.login'));
    }
}
