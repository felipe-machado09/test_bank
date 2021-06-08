<?php

namespace Modules\User\Entities\Actions;

use Modules\User\Entities\User;

final class ListUserAction
{
    public function __invoke($filter)
    {
        $user = app(User::class);

        switch ($filter) {
            case 'actives':
                $data =  $user->orderby('name','asc')->withTrashed()->paginate(15);
                break;
            case 'inactives':
                $data =  $user->orderby('name','asc')->onlyTrashed()->paginate(15);
                break;
            default:
                $data =  $user->orderby('name','asc')->paginate(15);
        }
        return $data;
    }
}
