<?php

namespace Modules\Transaction\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Transaction\Entities\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckColumnsTransactionTest extends TestCase
{
      /**  @test  **/

      public function check_if_transaction_collumns_is_correct()
      {
          $model = new Transaction;

          $expected = [
            'payer_id',
            'payee_id',
            'value',
            'type_transaction'
          ];

          $arrayCompared = array_diff($expected, $model->getFillable());

          $this->assertEquals(0, count($arrayCompared));

      }
}
