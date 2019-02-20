<?php $__env->startSection('content'); ?>

    <header class="flex items-center mb-4 ">
        <div class="flex justify-between w-full items-end">
            <h2 class="text-grey text-sm font-normal">My Projects</h2>

            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    
    <main class="lg:flex lg:flex-wrap -mx-3 py-4">
        <?php if($projects->isNotEmpty()){
            foreach ($projects as $project){?>
                <div class="lg:w-1/3 px-3 pb-6">
                    <?php echo $__env->make('projects.card', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php }
        } else {
            ?> <div>No Projects Yet</div> <?php
        } ?>
    </main> 
    
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>