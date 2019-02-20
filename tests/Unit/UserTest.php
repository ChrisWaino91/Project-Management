<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    public function a_user_has_projects(){

        factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->projects);

    }

}
