<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityFormRequest;
use App\Models\Activity;
use App\Models\CulturalRight;
use App\Models\Expertise;
use App\Models\Nac;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $consecLetters = 'F';
        $consecNumber = Activity::pluck('id')->max() + 1;

        $final_hour = Carbon::parse($request->input('final_hour'))->format('H:i:s');
        $start_time = Carbon::parse($request->input('start_time'))->format('H:i:s');

        if ($consecNumber == null) {
            $consec = "F1";
        }

        $consec = strval($consecLetters) . ($consecNumber);

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
        $activity = Activity::find($id);

        $expertises = Expertise::where('id', $activity->expertise_id)
            ->union(Expertise::where('name', "!=", $activity->expertise_id))
            ->get();

        $nacs = Nac::where('id', $activity->nac_id)
            ->union(Nac::where('name', "!=", $activity->nac_id))
            ->get();

        $culturalRigths = CulturalRight::where('id',  $activity->cultural_right_id)
            ->union(CulturalRight::where('name', "!=",  $activity->cultural_right_id))
            ->get();

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
        $final_hour = Carbon::parse($request->input('final_hour'))->format('H:i:s');
        $start_time = Carbon::parse($request->input('start_time'))->format('H:i:s');

        $activity->update([
            'activity_name' => $request->activy_name,
            'start_time' => $start_time,
            'final_hour' => $final_hour,
            'activity_date' => $request->activity_date,
            'nac_id' => $request->nac_id,
            'expertise_id' => $request->expertises,
            'cultural_right_id' => $request->cultural_rights,
        ]);

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
        Activity::destroy($activity->id);
        return back();
    }
}
