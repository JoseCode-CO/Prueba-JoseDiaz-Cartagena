<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ActivityApiRequest;
use App\Http\Resources\Api\V1\ActivityResource;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ActivityController extends Controller
{
    /**
     * It returns all the activitys with their expertise, culturalRight and nac
     *
     * @return All the activitys with their expertise, culturalRight and nac.
     */
    public function index()
    {
        //Consulto todas las actividades y muestro la data con la relacciones
        $activitys = Activity::with('expertise', 'culturalRight', 'nac')->get();

        //ruta: http://127.0.0.1:8000/api/v1/activity
        //Method: get

        return response()->json([
            'data' => $activitys,
        ], 201);
    }

    public function store(ActivityApiRequest $request)
    {
        try {
            $consecLetters = 'F';
            $consecNumber = Activity::pluck('id')->max() + 1;

            $final_hour = Carbon::parse($request->input('final_hour'))->format('H:i:s');
            $start_time = Carbon::parse($request->input('start_time'))->format('H:i:s');

            if ($consecNumber == null) {
                $consec = "F1";
            }

            $consec = strval($consecLetters) . ($consecNumber);

            /*
            Ruta: http://127.0.0.1:8000/api/v1/activity
            //Method: post
            */

            /*
           Body
          {
			"activy_name": "eiee",
			"start_time": "11:53:00",
			"final_hour": "11:56:00",
			"activity_date": "2023-01-25",
			"nac_id": 7,
			"expertises_id": 6,
			"cultural_rights_id": 4
         }
        */

            $data = Activity::create([
                'consecutive' => $consec,
                'activity_name' => $request->activy_name,
                'start_time' => $start_time,
                'final_hour' => $final_hour,
                'activity_date' => $request->activity_date,
                'nac_id' => $request->nac_id,
                'expertise_id' => $request->expertises_id,
                'cultural_right_id' => $request->cultural_rights_id,
            ]);

            return response()->json([
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'error' => $e,
            ], 404);
        }
    }

    /**
     * It returns a JSON response with the data of the activity with the given id
     *
     * @param id The id of the activity you want to retrieve.
     *
     * @return The data is being returned in a json format.
     */
    public function show($id)
    {
        //Ruta: http://127.0.0.1:8000/api/v1/activity/1
        //Method: get

        try {

            $data = Activity::find($id);

            return response()->json([
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'error' => $e,
            ], 404);
        }
    }


    /**
     * It updates the activity
     *
     * @param ActivityApiRequest request The request object.
     * @param Activity activity The activity object that will be updated.
     *
     * @return The activity that was updated.
     */
    public function update(ActivityApiRequest $request, Activity $activity)
    {
        try {
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
                'expertise_id' => $request->expertises_id,
                'cultural_right_id' => $request->cultural_rights_id,
            ]);

            return response()->json([
                'data' => $activity,
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'error' => $e,
            ], 404);
        }
    }

    /**
     * It deletes the activity with the id that is passed as a parameter.
     *
     * @param id The id of the activity to be deleted.
     */
    public function destroy($id)
    {
        //Ruta: http://127.0.0.1:8000/api/v1/activity/1
        //Method: delete

        if (Activity::destroy($id)) {
            return response()->json([
                'meesage' => "Eliminado con exito",
            ], 200);
        }
        return response()->json([
            'meesage' => "Error",
        ], 404);
    }
}
