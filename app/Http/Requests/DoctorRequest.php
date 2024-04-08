<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'doctor.name' => 'required',
        ];
        $request = Request::capture();
        $doctorarray = $request->get('doctor');
        if (empty($doctorarray['id'])) {//new
            $rules['doctor.name'] = ['required', Rule::unique('doctor_types', 'name')];
        } else {//update
            $rules['doctor.name'] = ['required', Rule::unique('doctotypes', 'name')->ignore($doctorarray['id'])];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'doctor.name.required' => 'Doctor name is required',
        ];
    }
}
