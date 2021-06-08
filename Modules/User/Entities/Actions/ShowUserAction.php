<?php

namespace Modules\User\Entities\Actions;

use Modules\User\Entities\User;



final class ShowUserAction
{
    public function __invoke($id)
    {
        $user = app(User::class);
        $data = $user->findOrFail($id);

        return $data;
    }
}
