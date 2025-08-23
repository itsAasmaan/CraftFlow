<?php

namespace App\Services\Prototype;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class ProjectPrototype
{
    public static function clone(Project $project, string $newName, array $assignments = []): Project
    {
        return DB::transaction(function () use ($project, $newName) {
            $newProject = Project::create([
                'company_id'  => $project->company_id,
                'name'        => $newName,
                'description' => $project->description,
                'template_id' => $project->id,
            ]);

            foreach ($project->tasks as $task) {
                Task::create([
                    'project_id'  => $newProject->id,
                    'title'       => $task->title,
                    'status'      => 'todo',
                    'assigned_to' => $assignments[$task->id] ?? null,
                ]);
            }

            return $newProject;
        });
    }
}
