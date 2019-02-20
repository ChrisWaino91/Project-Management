<?php $__env->startSection('content'); ?>

<h3 class="font-normal text-xl mb-6 py-4 -ml-5 text-center pl-4 mb-3">Edit Your Project</h3>

    <div class="card p-8">
        <form method="POST" action="<?php echo $project->path() ?>"> 
            <?php echo method_field('PATCH'); ?>
            <?php echo $__env->make('projects.form', [
                'buttonText' => 'Update Project'
                ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </form>
    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>