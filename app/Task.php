<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $guarded = [];

    // This means that if a task is updated - this will also update the 'updated_at' timestamp in the database
    // for the associated parent ('project') as well, rather than just the task. $touches is a reserved word in Laravel
    protected $touches = ['project'];


    protected static function boot(){
        parent::boot();

    //     static::created(function ($task){
    //         $task->project->recordActivity('created');
    //     });


    //     static::updated(function ($task){
    //         $task->project->recordActivity('updated');
    //    });

    }


    public function project(){
    return $this->belongsTo(Project::class);
    }

    public function path(){
        return "/projects/{$this->project->id}/tasks/$this->id";
    }

    public function complete(){
        $this->update(['completed' => true]);
        $this->recordActivity('completed');
    }

    public function recordUpdate(){
        $this->recordActivity('updated');
    }

    public function incomplete(){
        $this->update(['completed' => false]);

        $this->recordActivity('incompleted');
    }

    public function recordActivity($description){
        $this->activity()->create([
            'project_id' => $this->project_id,
            'description' => $description

        ]);
    }

    
    public function activity(){
        return $this->morphMany(Activity::class, 'subject')->latest();
    }



}
