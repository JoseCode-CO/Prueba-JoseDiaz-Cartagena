<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'activy_name' =>  'required',
            'start_time' =>  'required',
            'activity_date' =>  'required',
            'final_hour' => 'required|after:start_time',
        ];
    }

    public function messages()
    {
        return [
            'activy_name.required'   => 'Este campo es requerido',
            'start_time.required'   => 'Este campo es requerido',
            'final_hour.required'   => 'Este campo es requerido',
            'final_hour.after'   => 'La hora que esta ingresando debe ser mayor a la hora de inicio',
            'activity_date.required'   => 'Este campo es requerido',
        ];
    }
}
