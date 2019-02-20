@extends('layouts.app')

@section('content')

<h3 class="font-normal text-xl mb-6 py-4 -ml-5 text-center pl-4 mb-3">Edit Your Project</h3>

    <div class="card p-8">
        <form method="POST" action="<?php echo $project->path() ?>"> 
            @method('PATCH')
            @include ('projects.form', [
                'buttonText' => 'Update Project'
                ])
        </form>
    </div> 
@endsection