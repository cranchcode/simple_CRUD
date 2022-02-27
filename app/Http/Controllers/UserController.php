<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /** Login Section */
    function viewLogin(Request $req){
        if ($req->session()->has('user')){
            return 'Logged In';
        }else {
            return view('user.login');
        }
    }

    function loginAccount(Request $req){
        if ($req->session()->has('user')){
            return 'Logged In';
        }else {
            $inputs = $req->input();

            foreach ($inputs as $i){
                if (empty($i)){
                    return 'Empty Fields';
                }
            }

            $user = User::where(['email'=>$inputs['email']])->get()->first();
            if ($user && Hash::check($inputs['password'],$user->password)){
                $req->session()->put('user',$user);
                return 'Logging you in';
            }else {
                return 'Invalid email or password';
            }
        }
    }

    function viewProfile(Request $req){
        if ($req->session()->has('user')){
            $user = User::where(['uuid'=>$req->session()->get('user')->uuid])->get()->first();
            return view('user.profile',[
                'user' => $user,
            ]);
        }else {
            return redirect('/login');
        }
    }

    function viewEdit(Request $req){
        if ($req->session()->has('user')){
            $user = User::where(['uuid'=>$req->session()->get('user')->uuid])->get()->first();
            return view('user.edit',[
                'user'=>$user
            ]);
        }else {
            return redirect('/login');
        }
    }

    function editAccount(Request $req){
        if ($req->session()->has('user')){
            $inputs = $req->input();
            foreach($inputs as $i){
                if (empty($i)){
                    return 'Empty Fields';
                }
            }
            $user = User::where(['uuid'=>$req->session()->get('user')->uuid])->get()->first();
            if (Hash::check($inputs['currPassword'],$user->password)){
                User::where(['email'=>$user->email])->update([
                    'username' => $inputs['username'],
                    'firstName' => $inputs['firstName'],
                    'lastName' => $inputs['lastName'],
                    'email' => $inputs['email'],
                ]);
            }else {
                return 'Invalid Password';
            }
            

        }else {
            return redirect('/login');
        }
    }

    function deleteAccount(Request $req){
        if ($req->session()->has('user')){
            $user = User::where(['uuid'=>$req->session()->get('user')->uuid])->get()->first();
            User::find($user->uuid)->delete();
            $req->session()->forget('user');
        }
    }
}
