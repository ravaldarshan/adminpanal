<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class employee extends FormRequest
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
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'role_as'=>['required'],
            'gender'=> ['required','in:male,female'],
            'salary'=> ['string', 'max:255'],
            'password'=> ['string', 'max:255'],
            'dob'=>['required'],
            'contact'=>['required'],
            'alt_contact'=>['required'],
            'imgage'=> ['nullable','string', 'max:255'],
            'credits'=> ['string', 'max:255'],
            'address'=> ['string', 'max:255'],
        ];
    }
}
