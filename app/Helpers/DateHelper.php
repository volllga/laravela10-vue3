<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class DateHelper
{
    public static function dateToString($date, $timezone = null): string
    {
        try {
            if ($date) {
                $carbonDate = Carbon::parse($date);

                if ($timezone) {
                    $carbonDate->setTimezone($timezone);
                }

                return $carbonDate->format('d M, Y');
            }
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error occurred while formatting date: ' . $e->getMessage());
        }

        return '';
    }
}
