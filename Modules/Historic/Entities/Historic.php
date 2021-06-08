<?php

namespace Modules\Historic\Entities;

use Modules\User\Entities\User;
use Modules\Account\Entities\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Historic extends Model
{
    use HasFactory;

    protected $table = 'historic';
    protected $with = ['account','payer','payee'];
    protected $fillable = [
        'account_id',
        'payer_id',
        'payee_id',
        'previous_balance',
        'future_balance',
        'value',
        'type_historic',
    ];

    function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
    function payer() {
        return $this->belongsTo(User::class, 'payer_id', 'id');
    }
    function payee() {
        return $this->belongsTo(User::class, 'payee_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Historic\Database\factories\HistoricFactory::new();
    }
}
