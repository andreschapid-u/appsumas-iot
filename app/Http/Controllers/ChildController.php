<?php

namespace App\Http\Controllers;

use App\Child;
use Illuminate\Http\Request;
use App\Http\Requests\ChildRegisterFormRequest;
use App\Avatar;
use App\Level;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Challenge;
use App\Operation;

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
            return redirect()->route("jugadores.index");
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
    public function play()
    {
        $players = auth()->user()->children;
        return view("jugar")
        ->with("players", $players);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function validar($jugador)
    {
        $player = auth()->user()->children()->findOrFail($jugador);
        return view("validar")
        ->with("player", $player);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function irhome(Request $request)
    {
        $jugador = $request->id_jugador;
        $player = auth()->user()->children()->findOrFail($jugador);
        session(['player' => $jugador]);
        return view("jugadores.home");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        return view("jugadores.home");
    }

    public function retos(Request $request)
    {
        if(session("player")){
            $children = Child::findOrFail(session("player"));
            // dd($children->challenges);
            return view("jugadores.retos")->with("children", $children);
        }
        return redirect()->route("jugador.retos");
    }

    public function resolver(Request $request, $id_reto)
    {
        $player = Child::findOrFail(session("player"));
        // session(['player' => );
        $reto = Challenge::findOrFail($id_reto);
        foreach ($reto->operations as $ope) {
            if($player->operations()->find($ope->id) == null){
                return view("jugadores.operacion")->with("operacion", $ope);
            }
        }
        $mireto = $player->challenges()->detach($reto);
        return view("jugadores.retos")->with("children", $player);
    }
    public function guardarOperacion(Request $request)
    {
        $respuesta = $request->res;
        $operacion = Operation::findOrFail($request->operacion);
        $estado = $request->estado;
        $player = Child::findOrFail(session("player"));
        // $player = session("player");
        // session(['player' => Child::findOrFail($player->id)]);
        $player->operations()->attach($operacion,[
            "answer"=>$respuesta,
            "state"=>$estado,
            "operation_id"=>$operacion->id
        ]);
        return redirect()->route("jugador.retos.resolver",[$operacion->challenge->id]);
    }



}
