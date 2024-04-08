<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class BedRequest extends FormRequest
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
            'bed.name' => 'required',
            'bed.roomid' => 'required',
        ];
        $request = Request::capture();
        $bedarray = $request->get('bed');
        if (empty($bedarray['id'])) {//new
            $rules['bed.name'] = ['required', Rule::unique('beds', 'name')];
            $rules['bed.roomid'] = ['required', Rule::unique('beds', 'roomid')];
        } else {//update
            $rules['bed.name'] = ['required', Rule::unique('beds', 'name')->ignore($bedarray['id'])];
            $rules['bed.roomid'] = ['required', Rule::unique('beds', 'roomid')->ignore($bedarray['id'])];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'bed.name.required' => 'Bed name is required',
            'bed.roomid.required' => 'room number is required',
        ];
    }
}
