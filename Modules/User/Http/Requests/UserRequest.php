<?php

namespace Modules\User\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\User\Entities\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'email' => "required|email|unique:users,email,".$this->id,
            'cpf' => 'required_if:cnpj,null|required|unique:users,cpf,'. $this->id,
            'cnpj' => "required_if:cpf,null|unique:users,cnpj,". $this->id,
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
