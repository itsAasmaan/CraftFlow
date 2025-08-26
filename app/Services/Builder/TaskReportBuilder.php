<?php

namespace App\Services\Builder;

use App\Models\Task;

class TaskReportBuilder implements ReportBuilder
{
    protected Report $report;

    public function __construct()
    {
        $this->report = new Report();
    }

    public function setTitle(): void
    {
        $this->report->setTitle('Task Report');
    }

    public function setHeaders(): void
    {
        $this->report->setHeaders(['Task', 'Project', 'Assigned To', 'Status']);
    }

    public function setRows(): void
    {
        $tasks = Task::with('project', 'assignee')->get();
        foreach ($tasks as $task) {
            $this->report->addRow([
                $task->title,
                $task->project->name ?? 'N/A',
                $task->assignee->name ?? 'Unassigned',
                ucfirst($task->status)
            ]);
        }
    }

    public function getReport(): Report
    {
        return $this->report;
    }
}
