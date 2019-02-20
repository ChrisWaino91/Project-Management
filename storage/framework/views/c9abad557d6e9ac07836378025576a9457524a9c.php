<?php echo csrf_field(); ?>

            <div class="field">
                <label class="label text-grey text-lg font-normal mb-3" for="title">Title</label>
                <div class="control">
                    <input type="text" name="title" class="mt-2 mb-5 w-full input p-3 border border-solid border-grey-lighter rounded-lg" placeholder="Start a New Project" required value="<?php echo $project->title ?>">
                </div>
            </div>

            <div class="field">
                <label class="label text-grey text-lg font-normal mb-3" for="description">Description</label>
                <div class="control">
                    <textarea type="text" name="description" class="mt-2 mb-5 w-full input p-3 border border-solid border-grey-lighter rounded-lg" style="height:200px" required><?php echo $project->description ?></textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link mr-4"><?php echo $buttonText ?></button>
                    <a href="<?php echo $project->path()?>">Cancel</a>
                </div>
            </div>

            <?php if ($errors->any()){?>
                <div class="field mt-6"> <?php
                   foreach ($errors->all() as $error){
                       ?><li class="text-sm text-red"><?php echo $error ?></li><?php
                   } 
                ?></div><?php
            }?>
        </div>