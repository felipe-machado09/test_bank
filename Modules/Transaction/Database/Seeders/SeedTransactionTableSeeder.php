<?php

namespace Modules\Transaction\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Transaction\Entities\Transaction;
use Illuminate\Database\Eloquent\Model;

class SeedTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Transaction::factory()->count(100)->create();

    }
}
