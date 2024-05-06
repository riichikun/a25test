<?php

namespace Tests\Unit;

use Tests\TestCase;


class ExampleTest extends TestCase
{
   
    public function test_api_add_employee(): void
    {
        $this->postJson('api/employees', [
            'email' => '1111@example.com',
            'password' => '1234'
        ])->assertOk()->dump();
    }

    public function test_api_add_transaction(): void
    {
        $this->postJson('api/transactions', [
            'employee_id' => 1,
            'hours' => 1
        ])->assertOk()->dump();
    }
 
    public function test_api_show_transaction(): void
    {
        $this->json('GET', 'api/transactions', [
            'employee_id' => 1
        ])->assertOk()->dump();
    }

   
    public function test_api_delete_transaction(): void
    {
        $this->json('DELETE', 'api/transactions', [
            'employee_id' => 1
        ])->assertOk()->dump();
    }
}
