<?php

namespace Modules\Historic\Entities\Actions;

use Modules\Historic\Entities\Historic;

final class ListAllHistoricAction
{
    public function __invoke($filter = null)
    {
        $historic = app(Historic::class);

        $data =  $historic->
        orderby('created_at','desc')->get();

        return $data;
    }
}
