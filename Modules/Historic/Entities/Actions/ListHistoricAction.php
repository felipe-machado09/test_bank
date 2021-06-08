<?php

namespace Modules\Historic\Entities\Actions;

use Modules\Historic\Entities\Historic;

final class ListHistoricAction
{
    public function __invoke($filter)
    {
        $historic = app(Historic::class);


        $data =  $historic->
            orderby('created_at','desc')->paginate(15);

        return $data;
    }
}
