<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'user.fname' => 'required',
            'user.mname' => 'required',
            'user.lname' => 'required',
            'user.dob' => 'required',
            'user.gender' => 'required',
            'user.roleid' => 'required',
        ];
        $request = Request::capture();
        $userarray = $request->get('user');
        if (empty($userarray['id'])) {//new
            $rules['user.username'] = ['required', Rule::unique('users', 'username')];
            $rules['user.email'] = ['required', Rule::unique('users', 'email')];
        } else {//update
            $rules['user.username'] = ['required', Rule::unique('users', 'username')->ignore($userarray['id'])];
            $rules['user.email'] = ['required', Rule::unique('users', 'email')->ignore($userarray['id'])];
        }

        if ($userarray['id'] == 1) {//super admin
            unset($rules['user.roleid']);
            $request->request->remove('user.roleid');
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'user.fname.required' => 'first name is required',
            'user.mname.required' => 'middle name is required',
            'user.lname.required' => 'last name is required',
            'user.dob.required' => 'date of birth is required',
            'user.gender.required' => 'gender is required',
            'user.roleid.required' => 'role is required',
        ];
    }
}
