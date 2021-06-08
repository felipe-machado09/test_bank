<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Account\Entities\Account;
use Illuminate\Database\Eloquent\Model;

class SeedAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Account::factory()->count(100)->create();

    }
}
