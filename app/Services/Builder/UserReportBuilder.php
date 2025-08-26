<?php

namespace App\Services\Builder;

use App\Models\User;

class UserReportBuilder implements ReportBuilder
{
    protected Report $report;

    public function __construct()
    {
        $this->report = new Report();
    }

    public function setTitle(): void
    {
        $this->report->setTitle('User Performance Report');
    }

    public function setHeaders(): void
    {
        $this->report->setHeaders(['User', 'Assigned Tasks', 'Completed', 'Pending']);
    }

    public function setRows(): void
    {
        $users = User::with('tasks')->get();
        foreach ($users as $user) {
            $completed = $user->tasks->where('status', 'completed')->count();
            $pending = $user->tasks->where('status', 'pending')->count();

            $this->report->addRow([
                $user->name,
                $user->tasks->count(),
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
