<?php

namespace Modules\User\Tests\Unit;

use Tests\TestCase;
use Modules\User\Entities\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckColumnsUserTest extends TestCase
{
      /**  @test  **/

      public function check_if_transaction_collumns_is_correct()
      {
          $model = new User;

          $expected = [
            'name',
            'email',
            'password',
            'cpf',
            'cnpj',
            'type_user'
          ];

          $arrayCompared = array_diff($expected, $model->getFillable());

          $this->assertEquals(0, count($arrayCompared));

      }
}
