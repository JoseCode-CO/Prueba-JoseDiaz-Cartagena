<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityFormRequest;
use App\Models\Activity;
use App\Models\CulturalRight;
use App\Models\Expertise;
use App\Models\Nac;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ActivityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activitys = Activity::all();

        return view('crud-activity.index', compact('activitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expertises = Expertise::all();
        $nacs = Nac::all();
        $culturalRigths = CulturalRight::all();

        return view('crud-activity.create', compact('expertises', 'nacs', 'culturalRigths'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityFormRequest $request)
    {
        //Defino la letra F para el consecutivo
        $consecLetters = 'F';

        //Hago una consulta por el ultimo id de la tabla Activity, para concatenar
        //Con la letra F y crear el consecutivo de manera automatica
        $consecNumber = Activity::pluck('id')->max() + 1;

        //Le agrego formato a la hora
        $final_hour = Carbon::parse($request->input('final_hour'))->format('H:i:s');
        $start_time = Carbon::parse($request->input('start_time'))->format('H:i:s');

        //Hago una condicion que si no hay registros en la tabla de actividad
        //Que agrege el primer consecutivo
        if ($consecNumber == null) {
            $consec = "F1";
        }

        //Creo el consecutivo de manera automatica concateno la letra F con un id
        $consec = strval($consecLetters) . ($consecNumber);

        //Creo la actividad
        Activity::create([
            'consecutive' => $consec,
            'activity_name' => $request->activy_name,
            'start_time' => $start_time,
            'final_hour' => $final_hour,
            'activity_date' => $request->activity_date,
            'nac_id' => $request->nac_id,
            'expertise_id' => $request->expertises,
            'cultural_right_id' => $request->cultural_rights,
        ]);

        //Retornamos a la vista con un mensaje
        session()->flash('success', 'Tu registro ha sido exitoso!');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Consultar actividad por id que se quiere editar
        $activity = Activity::find($id);

        //Hago una condicion que si el id que pasamos por url no existe que aborte el programa
        if ($activity == null) {
            abort(404);
        }

        //Hago 3 consultas para ordenar la expertise, el nac y el culturalRight que eligió el usuario
        //A la hora de crear la actividad, para que cuando vaya a editar su actividad en las listas
        //Desplegables salga el que seleccionó
        $expertises = Expertise::where('id', $activity->expertise_id)
            ->union(Expertise::where('name', "!=", $activity->expertise_id))
            ->get();

        $nacs = Nac::where('id', $activity->nac_id)
            ->union(Nac::where('name', "!=", $activity->nac_id))
            ->get();

        $culturalRigths = CulturalRight::where('id',  $activity->cultural_right_id)
            ->union(CulturalRight::where('name', "!=",  $activity->cultural_right_id))
            ->get();

        //Retorno la vista, y le pasao la data para el formulario
        return view('crud-activity.edit', compact('activity', 'expertises', 'culturalRigths', 'nacs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityFormRequest $request, Activity $activity)
    {
        //Formateo las fechas
        $final_hour = Carbon::parse($request->input('final_hour'))->format('H:i:s');
        $start_time = Carbon::parse($request->input('start_time'))->format('H:i:s');

        //Actualizo la actividad
        $activity->update([
            'activity_name' => $request->activy_name,
            'start_time' => $start_time,
            'final_hour' => $final_hour,
            'activity_date' => $request->activity_date,
            'nac_id' => $request->nac_id,
            'expertise_id' => $request->expertises,
            'cultural_right_id' => $request->cultural_rights,
        ]);

        //Retorno la vista con todos las actividades creadas
        return redirect()->route('activity.index', $activity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //Elimino una actividad
        Activity::destroy($activity->id);
        return back();
    }
}
