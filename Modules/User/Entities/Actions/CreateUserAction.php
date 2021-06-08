<?php

namespace Modules\User\Entities\Actions;

use Modules\User\Entities\User;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\DataTransferObject\UserData;



final class CreateUserAction
{
    public function __invoke(UserData $userData)
    {
        $data = User::create([
            'name' => $userData->name,
            'email' => $userData->email,
            'password' => Hash::make($userData->password),
            'cpf' => $userData->cpf,
            'cnpj' => $userData->cnpj,
            'type_user' => $userData->type_user,
        ]);
        return $data;
    }
}
