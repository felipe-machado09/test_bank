<?php

namespace Modules\Historic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoricRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account_id' => 'required|integer',
            'payer_id' => 'required|integer',
            'payee_id' => 'required|integer',
            'previous_balance' => 'required',
            'future_balance' => 'required',
            'value' => 'required',
            'type_historic' => 'required|string',
        ];
    }

    /**
     * Determine if the Historic is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
