<?php

namespace Modules\Historic\Tests\Unit;

use Tests\TestCase;
use Modules\Historic\Entities\Historic;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckColumnsHistoricTest extends TestCase
{
      /**  @test  **/

      public function check_if_historic_collumns_is_correct()
      {
          $model = new Historic;

          $expected = [
            'account_id',
            'payer_id',
            'payee_id',
            'previous_balance',
            'future_balance',
            'value',
            'type_historic',
          ];

          $arrayCompared = array_diff($expected, $model->getFillable());

          $this->assertEquals(0, count($arrayCompared));

      }
}
