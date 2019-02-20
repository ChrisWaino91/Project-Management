<div class="card mt-3">
        <ul class="text-xs list-reset">
            <?php foreach($project->activity as $activity){ 
              ?><li class="mb-2 mt-2">
                    @include ("projects.activity.{$activity->description}")  
                    <span class="text-grey">{{ $activity->created_at->diffForHumans(null, true)}}</span>
                </li>
            <?php
            }?>
        </ul>
   </div>