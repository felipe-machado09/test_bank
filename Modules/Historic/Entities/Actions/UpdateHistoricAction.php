<?php

namespace Modules\Historic\Entities\Actions;

use Modules\Historic\Entities\Historic;
use Modules\Historic\Entities\DataTransferObject\HistoricData;

final class UpdateHistoricAction
{
    public function __invoke(HistoricData $historicData, $id)
    {
        $historicContainer = app(Historic::class);
        $data = $historicContainer->findOrFail($id);

        $data->update([
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
