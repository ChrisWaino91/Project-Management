<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index(Project $project){
        
        

        $projects = auth()->user()->projects;

        dd($projects);
        
        return view('projects.index', compact('projects'));
    }


    public function show(Project $project){ // This is called Route Model Binding if I need to read more on this

        // if(auth()->user()->isNot($project->owner)){
        //     abort(403);
        // }

        // The above method is the way to do this in the function itself
        // However, this method uses the App/Policies/Projects.php policy 
        // Which also needs to be referenced in the Auth Service Provider
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }


    public function create(){

        return view('projects.create');

    }


    public function store(){

        // // Validate
        // $attributes = request()->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        //     ]);

        $project = auth()->user()->projects()->create($this->validateRequest());
        
        $attributes['owner_id'] = auth()->id();

        $project->recordActivity('created');
        
        // Redirect
        return redirect('/projects');
    }


    public function update(Project $project){

        if(auth()->user()->isNot($project->owner)){
            abort(403);
        }

        $project->update($this->validateRequest());

        
        request('notes') ? $project->recordActivity('notes_updated') : $project->recordActivity('project_updated');

        return redirect($project->path());

    }

    protected function validateRequest(){
        return request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable'
        ]);


    }


    public function edit(Project $project){

        return view('projects.edit', compact('project'));

    }


    public function destroy(Project $project){

        $project->delete();

        return redirect ('/projects');
    }


}
