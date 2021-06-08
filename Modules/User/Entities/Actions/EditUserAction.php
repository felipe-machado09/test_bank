<?php

namespace Modules\User\Entities\Actions;

use Modules\User\Entities\User;



final class EditUserAction
{
    public function __invoke($id)
    {
        $user = app(u::class);
        $data = $user->findOrFail($id);

        return $data;
    }
}
