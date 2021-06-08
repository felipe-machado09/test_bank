<?php

namespace Modules\Historic\Entities\Actions;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;
use Modules\Historic\Entities\Historic;
use Modules\Historic\Services\HistoricService;
use Modules\Historic\Entities\DataTransferObject\HistoricData;
use Modules\Historic\Entities\Actions\CheckUserCanHistoricAction;



final class CreateHistoricAction
{
    public function __invoke(HistoricData $historicData)
    {
        $data = Historic::create([
            'account_id' => $historicData->account_id,
            'payer_id' => $historicData->payer_id,
            'payee_id' => $historicData->payee_id,
            'previous_balance' => $historicData->previous_balance,
            'future_balance' => $historicData->future_balance,
            'value' => $historicData->value,
            'type_historic' => $historicData->type_historic,
        ]);

        return $data;

    }
}
