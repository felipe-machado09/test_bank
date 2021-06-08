<?php

namespace Modules\Transaction\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'payer_id' => 'required|integer',
            'payee_id' => 'required|integer',
            'value' => 'required',
            'type_transaction' => 'required|string',
        ];
    }

    /**
     * Determine if the Transaction is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
