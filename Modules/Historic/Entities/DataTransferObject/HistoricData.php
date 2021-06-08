<?php

namespace Modules\Historic\Entities\DataTransferObject;

use Modules\Historic\Http\Requests\HistoricRequest;
use Spatie\DataTransferObject\DataTransferObject;

class HistoricData extends DataTransferObject
{
    //** @var integer */
    public $account_id;

    //** @var integer */
    public $payer_id;

    //** @var integer */
    public $payee_id;

    //** @var string */
    public $previous_balance;

    //** @var string */
    public $future_balance;

    //** @var string */
    public $value;

    //** @var string */
    public $type_historic;


    public static function fromRequest(HistoricRequest $historicRequest ): HistoricData
    {
        return new Self([
            'account_id' => $historicRequest['account_id'],
            'payer_id' => $historicRequest['payer_id'],
            'payee_id' => $historicRequest['payee_id'],
            'previous_balance' => $historicRequest['previous_balance'],
            'future_balance' => $historicRequest['future_balance'],
            'value' => $historicRequest['value'],
            'type_historic' => $historicRequest['type_historic'],
        ]);
    }
}
