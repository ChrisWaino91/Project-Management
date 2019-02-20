<?php $__env->startSection('content'); ?>

<div class="card p-8">
    <h3 class="font-normal text-xl mb-6 py-4 -ml-5 text-center pl-4 mb-3">Create A Project</h3> 

    <form method="POST" action="/projects">
        <?php echo $__env->make('projects.form', [
            'project' => new App\Project,
            'buttonText' => 'Create Project'
            ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>