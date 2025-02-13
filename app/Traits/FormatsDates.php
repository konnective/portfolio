<?php
namespace App\Traits;

use Carbon\Carbon;

trait FormatsDates
{
    public function formatDate($timestamp)
    {
        return Carbon::parse($timestamp)->format('Y-m-d');
    }
}
