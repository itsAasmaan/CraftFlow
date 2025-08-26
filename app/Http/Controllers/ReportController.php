<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Builder\ReportDirector;
use App\Services\Builder\ProjectReportBuilder;
use App\Services\Builder\TaskReportBuilder;
use App\Services\Builder\UserReportBuilder;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function generate(Request $request)
    {
        $type = $request->input('type');

        switch ($type) {
            case 'projects':
                $builder = new ProjectReportBuilder();
                break;
            case 'tasks':
                $builder = new TaskReportBuilder();
                break;
            case 'users':
                $builder = new UserReportBuilder();
                break;
            default:
                return redirect()->back()->with('error', 'Invalid report type');
        }

        $director = new ReportDirector($builder);
        $report = $director->build();

        return view('reports.show', compact('report'));
    }
}
