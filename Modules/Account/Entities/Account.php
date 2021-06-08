<?php

namespace Modules\Account\Entities;

use Modules\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    protected $fillable = [
        'customer_id',
        'balance',
    ];
    protected $with = ['customer'];

    public function getBalanceAttribute($value)
    {
        if(isset($value)){
            return floatval($value);
        }
        return;
    }



    function customer() {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }



    protected static function newFactory()
    {
        return \Modules\Account\Database\factories\AccountFactory::new();
    }
}
