<?php

namespace App\Http\Requests\Users;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules(User $user)
    {
        return [
            'name' => 'required',
            // 'email' => 'sometimes|email|max:191|unique:users,email,'.$user->id,
            // 'password' => 'sometimes|min:8',
            // 'avatar' => 'required|avatar',
            'about' => 'required',

        ];
    }
}
