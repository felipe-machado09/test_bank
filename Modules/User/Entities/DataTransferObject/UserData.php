<?php

namespace Modules\User\Entities\DataTransferObject;

use Modules\User\Http\Requests\UserRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    //** @var string */
    public $name;

    //** @var string */
    public $email;

    //** @var string */
    public $password;

    //** @var string */
    public $cpf;

    //** @var string */
    public $cnpj;

    //** @var string */
    public $type_user;

    public static function fromRequest(UserRequest $userRequest ): UserData
    {
        return new Self([
            'name' => $userRequest['name'],
            'email' => $userRequest['email'],
            'password' => $userRequest['password'],
            'cpf' => $userRequest['cpf'],
            'cnpj' => $userRequest['cnpj'],
            'type_user' => $userRequest['type_user'],
        ]);
    }
}
