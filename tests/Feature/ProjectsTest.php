<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    // @test //  
    public function a_user_can_create_a_project(){

        $this->actingAs(factory('App\User')->create());

        $this->get('/projects/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
        }



        public function a_user_can_view_their_project(){

            $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

            $this->get($project->path())
                ->assertSee($project->title)
                ->assertSee($project->description);

        }



        public function an_authenticated_user_cannot_view_the_projects_of_others(){

            $project = factory('App\Project')->create();

            $this->get($project->path())->assertStatus(403);

            // A guest cannot create a project
            $this->get('/projects/create')->assertRedirect('login');

        }


        public function a_project_requires_a_title(){
            
            $this->actingAs(factory('App\User')->create());

            $attributes = factory('App\Project')->raw(['title' => '']);

            // This checks for errors and then will allow the view to loop through them if there are any
            $this->post('projects', $attributes)->assertSessionHasErrors('title');
        }




        public function a_project_requires_a_description(){

            $this->actingAs(factory('App\User')->create());

            $attributes = factory('App\Project')->raw(['description' => '']);
            
            // This checks for errors and then will allow the view to loop through them if there are any
            $this->post('projects', $attributes)->assertSessionHasErrors('description');
        }





        public function guests_cannot_create_projects(){

            $attributes = factory('App\Project')->raw();
            
           
            $this->post('projects', $attributes)->assertRedirect('login');

        }





        public function guests_cannot_view_projects(){
            
            $this->get('projects', $attributes)->assertRedirect('login');

        }



        public function guests_cannot_view_a_single_project(){

            $project = $attributes = factory('App\Project')->create();

            $this->get('$project'->path())->assertRedirect('login');

        }

}

