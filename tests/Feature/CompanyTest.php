<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
   public function test_admin_can_access_companies_index_page(){

    $user = User::factory()->admin()->create();
    $response = $this->actingAs($user)->get(route('companies.index'));

    $response->assertOk();

   }

   public function test_non_admin_cannot_access_index_page(){

    $user = User::factory()->create();

    $response  = $this->actingAs($user)->get(route('companies.index'));

    $response->assertForbidden();
   }


}
