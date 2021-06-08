<?php

namespace Modules\Account\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|integer',
            'balance' => 'required',
        ];
    }

    /**
     * Determine if the Account is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
