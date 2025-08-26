<?php

namespace App\Services\Builder;

class Report
{
    public string $title;
    public array $headers = [];
    public array $rows = [];

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function addRow(array $row): void
    {
        $this->rows[] = $row;
    }
}
