<?php

namespace Modules\Historic\Entities\Actions;

use Modules\Historic\Entities\Historic;

final class InactivateHistoricAction
{
    public function __invoke($id)
    {
        $historic = app(Historic::class);
        $data = $historic->findOrFail($id);

        $data->delete();

        return null;

    }
}
