<?php

namespace Modules\User\Entities\Actions;

use Modules\User\Entities\User;

final class ListAllUserAction
{
    public function __invoke()
    {
        $user = app(User::class);

        $data =  $user->orderby('name','asc')->get();

        return $data;
    }
}
