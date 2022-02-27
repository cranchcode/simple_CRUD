<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Task;
use App\Models\User;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if ($req->session()->has('user')){
            $user = User::where(['uuid'=>$req->session()->get('user')->uuid])->get()->first();
            $tasks = Task::where(['user_id'=>$user->uuid])->get()->all();
            return view('task.index',[
                'tasks'=>$tasks,
            ]);
        }else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        if ($req->session()->has('user')){
            return view('task.create');
        }else {
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if ($req->session()->has('user')){
            $user = User::where(['uuid'=>$req->session()->get('user')->uuid])->get()->first();
            Task::create([
                'uuid'=>Str::uuid(),
                'name'=>$req->input('taskName'),
                'user_id'=>$user->uuid,
            ]);
            return redirect('/tasks');
        }else {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req , $id)
    {
        if ($req->session()->has('user')){
            $task = Task::where(['uuid'=>$id])->first();
            return $task;
        }else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req,$id)
    {
        if ($req->session()->has('user')){
            $task = Task::where(['uuid'=>$id])->first();
            return view('task.edit',[
                'task'=>$task,
            ]);
        }else {
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        if ($req->session()->has('user')){
            $user = User::where(['uuid'=>$req->session()->get('user')->uuid])->get()->first();
            $task = Task::where(['uuid'=>$id])->first();

            if ($task->user_id == $user->uuid){
                Task::where(['uuid'=>$id])->update([
                    'name'=>$req->input('taskName'),
                ]);
                return redirect('/tasks');
            }else {
                return 'Not Authorized';
            }
        }else {
            return redirect('/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req,$id)
    {
        if ($req->session()->has('user')){
            $user = User::where(['uuid'=>$req->session()->get('user')->uuid])->get()->first();
            $task = Task::where(['uuid'=>$id])->first();

            if ($task->user_id == $user->uuid){
                Task::find($task->uuid)->delete();
                return redirect('/tasks');
            }else {
                return 'Not Authorized';
            }
        }else {
            return redirect('/login');
        }
    }
}
