
<div class="card" style="height:225px; position:relative;">
    <a href="<?php echo $project->path()?>">
        <h3 class="font-normal text-xl mb-6 py-4 -ml-5 border-l-4 border-blue-light pl-4 mb-3"><?php echo $project->title ?></h3>
    </a>
    <div class="text-grey mb-4"><?php echo str_limit($project->description) ?></div> 

    <footer style="position:absolute; bottom: 15px; right:15px;">
    <div id="confirm-delete"></div>
    <form class="text-right confirm-submit" method="POST" action="<?php echo e($project->path()); ?>">
            <?php echo method_field('DELETE'); ?>
            <?php echo csrf_field(); ?>
            <button type="submit" id="delete-button" style="color:red;">x</button>
    </form>
    </footer>
</div>
