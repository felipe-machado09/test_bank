<?php

namespace Modules\User\Entities\Actions;

use Modules\User\Entities\User;

final class InactivateUserAction
{
    public function __invoke($id)
    {
        $user = app(User::class);
        $data = $user->findOrFail($id);

        $data->delete();

        return "User Inactivated!";

    }
}
