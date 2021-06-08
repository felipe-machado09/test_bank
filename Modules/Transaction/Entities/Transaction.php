<?php

namespace Modules\Transaction\Entities;

use Modules\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $with = ['payer','payee'];
    protected $fillable = [
        'payer_id',
        'payee_id',
        'value',
        'type_transaction'
    ];

    function payee() {
        return $this->belongsTo(User::class, 'payee_id', 'id');
    }

    function payer() {
        return $this->belongsTo(User::class, 'payer_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Transaction\Database\factories\TransactionFactory::new();
    }
}
