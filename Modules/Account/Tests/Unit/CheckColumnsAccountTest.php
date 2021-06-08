<?php

namespace Modules\Account\Tests\Unit;

use Tests\TestCase;
use Modules\Account\Entities\Account;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckColumnsAccountTest extends TestCase
{

    /**  @test  **/

    public function check_if_account_collumns_is_correct()
    {
        $model = new Account;

        $expected = [
            'customer_id',
            'balance',
        ];

        $arrayCompared = array_diff($expected, $model->getFillable());

        $this->assertEquals(0, count($arrayCompared));

    }
}
