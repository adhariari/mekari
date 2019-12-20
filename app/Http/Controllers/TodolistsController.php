<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests;

class TodolistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //fetching all data from DB
        $todos = Todo::all();
        return view('todolists.index', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {   //giving validate for input to do list
        $this->validate($request, [
            'name' => 'required|max:100'
        ]);
        //upload data to DB
        Todo::create($request->all());
        return redirect('/todolists');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //updating task to done
        Todo::where('id', $todo->id)
            ->update([
                'is_done' => '1'
            ]);
        return redirect('/todolists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //delete task from list
        Todo::destroy($todo->id);
        return redirect('/todolists');
    }
}
