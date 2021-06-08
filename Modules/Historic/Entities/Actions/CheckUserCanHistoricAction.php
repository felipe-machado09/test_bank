<?php

namespace Modules\Historic\Entities\Actions;

use Modules\User\Entities\User;
use Modules\Historic\Entities\Historic;



final class CheckUserCanHistoricAction
{
    public function __invoke($payer_id)
    {
        $response = true;
        $user = app(User::class);

        $payer = $user->findOrFail($payer_id);
        $payer->type_user;

        if($payer->type_user == "Shopman"){
            $response = false;
        }
        return $response;
    }
}
