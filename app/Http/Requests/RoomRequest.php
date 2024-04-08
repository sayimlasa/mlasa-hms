<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
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
            'room.name' => 'required',
            'room.wardid' => 'required',
        ];
        $request = Request::capture();
        $roomarray = $request->get('room');
        if (empty($roomarray['id'])) {//new
            $rules['room.name'] = ['required', Rule::unique('rooms', 'name')];
        } else {//update
            $rules['room.name'] = ['required', Rule::unique('rooms', 'name')->ignore($roomarray['id'])];
            $rules['room.wardid'] = ['required', Rule::unique('rooms', 'roomid')->ignore($roomarray['id'])];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'room.name.required' => 'Room name is required',
            'room.wardid.required' => 'ward number is required',
        ];
    }
}
