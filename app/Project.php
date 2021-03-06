<?php

namespace App;
use App\Activity;
use App\Task;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function path(){

        return "/projects/{$this->id}";
    }


    public function owner(){
        return $this->belongsTo(User::class);
    }

        
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    
  
    public function recordActivity($description){
        $this->activity()->create([
        'description' => $description
        ]);
    }

    public function addTask($body){

        $this->tasks()->create(compact('body'));

        // Activity::create([
        //     'project_id' => $this->id,
        //     'description' => 'created'
        // ]);

        $this->recordActivity('created_task'); 
  
    }

    public function activity(){
        return $this->hasMany(Activity::class)->latest();
    }


   



}
