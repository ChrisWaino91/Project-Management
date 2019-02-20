<?php

// // This bit of code states that when an instance of Project has been created, run a function
// // That will create an instance of Activity and give it an attribute of 'project_id' equal to the project id of the project initially created.
// // Take a look at the database migration to see this connection configured
// \App\Project::created(function($project){
//     \App\Activity::create([
//         'project_id' => $project->id,
//         'description' => "project_created"
//     ]);
// });


// // This is the same of the above but creates a record of 'Updated' when a project has been updated
// // This only includes the project itself and not it's children at this point - eg editing a task will not cause this to fire
// // You can refactor this by creating an Observer file for all of this (Ep:20; 10:30) for more info
// \App\Project::updated(function($project){
//     \App\Activity::create([
//         'project_id' => $project->id,
//         'description' => 'Updated'
//     ]);
// });

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function (){
    
    Route::get('/projects', 'ProjectsController@index');
    Route::get('/projects/create', 'ProjectsController@create');
    Route::get('/projects/{project}', 'ProjectsController@show');
    Route::get('/projects/{project}/edit', 'ProjectsController@edit');
    Route::post('/projects', 'ProjectsController@store');
    Route::patch('/projects/{project}', 'ProjectsController@update');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::delete('projects/{project}', 'ProjectsController@destroy');

    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');


});

Auth::routes();

