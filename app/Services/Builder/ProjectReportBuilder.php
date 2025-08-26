<?php

namespace App\Services\Builder;

use App\Models\Project;

class ProjectReportBuilder implements ReportBuilder
{
    protected Report $report;

    public function __construct()
    {
        $this->report = new Report();
    }

    public function setTitle(): void
    {
        $this->report->setTitle('Project Report');
    }

    public function setHeaders(): void
    {
        $this->report->setHeaders(['Project Name', 'Tasks', 'Completed', 'Pending']);
    }

    public function setRows(): void
    {
        $projects = Project::with('tasks')->get();
        foreach ($projects as $project) {
            $completed = $project->tasks->where('status', 'completed')->count();
            $pending = $project->tasks->where('status', 'pending')->count();

            $this->report->addRow([
                $project->name,
                $project->tasks->count(),
                $completed,
                $pending
            ]);
        }
    }

    public function getReport(): Report
    {
        return $this->report;
    }
}
