<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'name', 'description', 'template_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function template()
    {
        return $this->belongsTo(Project::class, 'template_id');
    }
}
