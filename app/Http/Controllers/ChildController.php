<?php

namespace App\Http\Controllers;

use App\Child;
use Illuminate\Http\Request;
use App\Http\Requests\ChildRegisterFormRequest;
use App\Avatar;
use App\Level;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("jugadores.index")
            ->with("children", auth()->user()->children);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jugadores.create')
            ->with("avatars", Level::where("level", 1)->first()->avatars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildRegisterFormRequest $request)
    {
        //
        try {
            DB::beginTransaction();
            $newChild = new Child($request->all());
            $newChild->avatar_id = Avatar::find($request->avatar)->id;
            auth()->user()->children()->save($newChild);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();;
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function edit(Child $child)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Child $child)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        //
    }
}
