<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::check()) {
           // $user_id = \Auth::user_id() ;
            $user = \Auth::user() ;
            $tasks = Task::all();
            
            return view("tasks.index" , [
                //"user_id" => $user_id ,
                "tasks" => $tasks , 
                "user" => $user ,
            ]);
        }
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        return view("tasks.create" , [
            "task" => $task ,
            ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([ 
            "content" => "required" ,
            "status" => "required|max:10" ,
        ]);
        
        $request->user()->tasks()->create([
            //"user_id" => $request->user_id ,
            "content" => $request->content ,
            "status" => $request->status ,
            
            ]);
        
        
        
        
       
       return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        $user = \Auth::user() ;
        return view("tasks.show" ,[
            "task" => $task ,
            "user" => $user ,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task =Task::findOrFail($id);
        $user = \Auth::user() ;
        return view("tasks.edit" , [
            "task" => $task ,
            "user" => $user ,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([ 
            "content" => "required" ,
            "status" => "required|max:10" ,
        ]);
        
        $task = Task::findOrFail($id) ;
        if (\Auth::id() === $task->user_id){
            $task->content = $request->content ;
            $task->status = $request->status ;
            $task->save();
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $task = Task::findOrFail($id) ;
        if (\Auth::id() === $task->user_id){
            $task->delete() ;
        }
        
        
        return redirect("/");
    }
}
