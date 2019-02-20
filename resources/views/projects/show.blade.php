@extends ('layouts.app')




@section('content')

<header class="items-center mb-5">
        <div class="flex justify-between w-full items-end mb-5">
            <p class="text-grey text-sm font-normal" style="text-transform: capitalize;">
                <a href="/projects" class="text-grey text-sm font-normal">My Projects</a> / <?php echo $project->title ?>
            </p>

            <a href="<?php echo $project->path() . '/edit'?>" class="button">Edit Project</a>
        </div>
</header>

<main>
    <div class="lg:flex -mx-3">
        <div class="lg:w-3/4 px-3 mb-6">
            <div class="mb-8">  


                <h2 class="text-grey text-lg font-normal mb-3">Tasks</h2>
                       <?php foreach ($project->tasks as $task) {?>
                            <form method="POST" action="<?php echo $project->path() . '/tasks/' . $task->id?> ">
                        @method('PATCH')
                                @csrf
                                <div class="card mb-3">
                                    <div class="flex">
                                        <input name="body" value="<?php echo $task->body?>" class="w-full <?php echo ($task->completed) ? 'text-grey' : ''?>">
                                        <input type="checkbox" style="margin-top:4px;" name="completed" onChange="this.form.submit()" <?php echo ($task ->completed) ? "checked" : ""?>>
                                    </div>
                                </div>
                            </form>
                        <?php }
                    
                    ?><form action="{{ $project->path() . '/tasks'}}" method="POST">
                        @csrf
                        <div class="card">
                            <input class="w-full" name="body" placeholder="Add Task...">
                        </div>
                        <button type="submit" class="button mt-3">Add Task</button>
                    </form>
            </div>

            <div>
                <h2 class="text-grey text-lg font-normal mb-3">General Notes</h2>
                <form action="<?php echo $project->path()?>" method="post">
                    @csrf
                    @method('PATCH')

                    <textarea name="notes" class="card w-full mb-4" style="min-height:200px" placeholder="Feel Free To Make Any Notes Here!"><?php echo $project->notes ?></textarea>
                
                    <button type="submit" class="button">Save</button>
                </form>

                <?php if ($errors->any()){?>
                    <div class="field mt-6"> <?php
                       foreach ($errors->all() as $error){
                           ?><li class="text-sm text-red"><?php echo $error ?></li><?php
                       } 
                    ?></div><?php
                }?>

                
            </div>
        </div>
        <div class="lg:w-1/4 px-3">
           @include ('projects.card')

           @include ('projects.activity.card')
        </div>
    </div>
</main>

@endsection 