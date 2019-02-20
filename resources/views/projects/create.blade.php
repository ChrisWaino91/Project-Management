@extends('layouts.app')

@section('content')

<div class="card p-8">
    <h3 class="font-normal text-xl mb-6 py-4 -ml-5 text-center pl-4 mb-3">Create A Project</h3> 

    <form method="POST" action="/projects">
        @include ('projects.form', [
            'project' => new App\Project,
            'buttonText' => 'Create Project'
            ])
    </form>
</div>

@endsection