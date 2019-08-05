<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;
use App\Operation;
use App\Http\Requests\ChallengeRegisterFormRequest;
use Illuminate\Support\Facades\DB;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $numMax = 4;
    public function index()
    {

        return view("retos.index")
            ->with("challenges", auth()->user()->challenges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("retos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChallengeRegisterFormRequest $request)
    {

        try {
            DB::beginTransaction();
            $challenge = new Challenge($request->all());
            $challenge = auth()->user()->children()->save($challenge);
            // dd($challenge);
            // dd($this->generarResta());
            for ($i=0; $i < $challenge->num_sums; $i++) {
                $challenge->operations()->save($this->generarSuma());
            }
            for ($i=0; $i < $challenge->num_subtraction; $i++) {
                $challenge->operations()->save($this->generarResta());
            }
            foreach (auth()->user()->children as $child) {
                $child->challenges()->save($challenge);
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();;
            //throw $th;
        }
        return redirect()->route("retos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge, $id)
    {
        return view("retos.show")
        ->with("reto",Challenge::findOrfail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        //
    }

    private function generarSuma()
    {
        $res = rand(rand(1, $this->numMax), $this->numMax);
        $sumando1  = rand(0, $res);
        $sumando2  = $res - $sumando1;
        $op = new Operation();
        $op->type = "Sum";
        $op->value_one = $sumando2;
        $op->value_two = $sumando1;
        $op->value_three = $res;
        return $op;
    }
    private function generarResta()
    {
        $res = rand(rand(1, $this->numMax), $this->numMax);
        $sumando1  = rand(0, $res);
        $sumando2  = $res - $sumando1;
        $op = new Operation();
        $op->type = "Subtraction";
        $op->value_three = $sumando2;
        $op->value_two = $sumando1;
        $op->value_one = $res;
        return $op;
    }
}
