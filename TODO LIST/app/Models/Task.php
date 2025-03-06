<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', "completed"];

    public function completed()
    {
        $this->completed = 1;
        $this->save();
    }

    protected $cast = [
        'completed' => "boolean"
    ];
}
