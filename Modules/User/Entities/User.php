<?php

namespace Modules\User\Entities;

use App\Helpers\Helpers;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{

    use SoftDeletes, HasFactory, HasApiTokens;
    protected $dates = ['deleted_at'];
    protected $table = 'users';
    protected $hidden = ['password'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'cnpj',
        'type_user'
    ];


    public function getCpfAttribute($value)
    {
        if(isset($value)){
            return Helpers::maskCpf($value);
        }
        return;
    }

    public function getCnpjAttribute($value)
    {
        if(isset($value)){
            return Helpers::maskCnpj($value);
        }
        return;

    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function Factory()
    {
        return \Modules\User\Database\Factories\UserFactory::new();
    }
}
