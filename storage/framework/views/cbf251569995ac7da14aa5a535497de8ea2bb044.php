<div class="card mt-3">
        <ul class="text-xs list-reset">
            <?php foreach($project->activity as $activity){ 
              ?><li class="mb-2 mt-2">
                    <?php echo $__env->make("projects.activity.{$activity->description}", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
                    <span class="text-grey"><?php echo e($activity->created_at->diffForHumans(null, true)); ?></span>
                </li>
            <?php
            }?>
        </ul>
   </div>