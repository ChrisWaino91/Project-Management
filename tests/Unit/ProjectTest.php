<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase {

    public function it_has_a_path(){
        
        factory('App\Project')->create();

        $this->assertEquals('/projects' . $project->id, $project->path());

    }

    public function it_belongs_to_an_owner(){

        $project = factory('App\Project')->create();

        $this->asserrtInstanceOf('App\User', $project->owner);
    }


    public function it_can_add_a_task(){
        $project = factory('App\Project')->create();

        $project->addTask('Test task');

        $this->assertCount(1, $project->tasks);
    }

}