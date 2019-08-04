<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Level;
use App\Avatar;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrador']); // Administrador del Sistema
        Role::create(['name' => 'Tutor']); // El encargado de registrar los jugadores
        Role::create(['name' => 'Jugador']); // El que va a realizar las operaciones

        Level::create(["level"=>1, "experience"=>0]);
        Level::create(["level"=>2, "experience"=>15]);
        Level::create(["level"=>3, "experience"=>40]);
        Level::create(["level"=>4, "experience"=>90]);
        Level::create(["level"=>5, "experience"=>200]);

        $abeja = new Avatar();
        $abeja->name = "Abeja";
        $abeja->route = asset("/avatars/Nivel_1/abejaT.png");
        $abeja->characteristics = "Sonante y veloz";
        $arania = new Avatar();
        $arania->name = "Araña";
        $arania->route = asset("/avatars/Nivel_1/araniaT.png");
        $arania->characteristics = "Cazadora";
        $mariposa = new Avatar();
        $mariposa->name = "Mariposa";
        $mariposa->route = asset("/avatars/Nivel_1/mariposaT.png");
        $mariposa->characteristics = "Sonante y veloz";

        Level::where("level",1)->first()->avatars()->save($abeja);
        Level::where("level",1)->first()->avatars()->save($arania);
        Level::where("level",1)->first()->avatars()->save($mariposa);


        $conejo = new Avatar();
        $conejo->name = "Conejo";
        $conejo->route = asset("/avatars/Nivel_2/conejoT.png");
        $conejo->characteristics = "Brinca sin cansarse";

        $gato = new Avatar();
        $gato->name = "Gato";
        $gato->route = asset("/avatars/Nivel_2/gatoT.png");
        $gato->characteristics = "Maúlla todo el día";

        $perro = new Avatar();
        $perro->name = "Perro";
        $perro->route = asset("/avatars/Nivel_2/perroT.png");
        $perro->characteristics = "Ladra y se muerde la cola";


        Level::where("level",2)->first()->avatars()->save($conejo);
        Level::where("level",2)->first()->avatars()->save($gato);
        Level::where("level",2)->first()->avatars()->save($perro);

        $bufalo = new Avatar();
        $bufalo->name = "Búfalo";
        $bufalo->route = asset("/avatars/Nivel_3/bufaloT.png");
        $bufalo->characteristics = "Un imponente animal de cuernos fuertes";

        $cebra = new Avatar();
        $cebra->name = "Cebra";
        $cebra->route = asset("/avatars/Nivel_3/cebraT.png");
        $cebra->characteristics = "LLeva un hermoso pelaje rallado";

        $mono = new Avatar();
        $mono->name = "Mono";
        $mono->route = asset("/avatars/Nivel_3/monoT.png");
        $mono->characteristics = "Va de árbol en árbol comiendo banano";


        Level::where("level",3)->first()->avatars()->save($bufalo);
        Level::where("level",3)->first()->avatars()->save($cebra);
        Level::where("level",3)->first()->avatars()->save($mono);

        $elefante = new Avatar();
        $elefante->name = "Elefante";
        $elefante->route = asset("/avatars/Nivel_4/elefanteT.png");
        $elefante->characteristics = "Un imponente animal de orejas grandes";

        $jirafa = new Avatar();
        $jirafa->name = "Jirafa";
        $jirafa->route = asset("/avatars/Nivel_4/jirafaT.png");
        $jirafa->characteristics = "Tan alta que toca el cielo";

        $tigre = new Avatar();
        $tigre->name = "Tigre";
        $tigre->route = asset("/avatars/Nivel_4/tigreT.png");
        $tigre->characteristics = "Un feroz animal";


        Level::where("level",4)->first()->avatars()->save($elefante);
        Level::where("level",4)->first()->avatars()->save($jirafa);
        Level::where("level",4)->first()->avatars()->save($tigre);

        $leon = new Avatar();
        $leon->name = "Leon";
        $leon->route = asset("/avatars/Nivel_5/leonT.png");
        $leon->characteristics = "El rey de la selva, todos quieren ser como él";

        Level::where("level",5)->first()->avatars()->save($leon);

    }
}
