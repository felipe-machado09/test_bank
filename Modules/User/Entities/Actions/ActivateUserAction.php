<?php

namespace Modules\User\Entities\Actions;

use Modules\User\Entities\User;

final class ActivateUserAction
{
    public function __invoke($id)
    {
        $user = app(User::class);
        $data = $user->onlyTrashed()->findOrFail($id);

        $data->restore();

        return "User Activated!";
    }
}
