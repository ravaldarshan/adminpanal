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
            'firs_tname' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'password'=> ['string', 'max:255'],
            'gender'=> ['string', 'max:255'],
            'imgage'=> ['string', 'max:255'],
            'credits'=> ['string', 'max:255'],
            'salary'=> ['string', 'max:255'],
            'address'=> ['string', 'max:255'],
        ];
    }
}
