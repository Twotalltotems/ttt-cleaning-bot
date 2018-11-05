<?php

namespace App;

use App\Employee;
use App\Notify;
use App\CleanHistory;
use App\Notifications\TheChosenOnes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class Cleaner {
    public static function chooseCleaners()
    {
        $employees = Employee::inRandomOrder()->limit(2)->get();

        if ($employees->count() < 2) {
            return;
        }

        while($employees->values()->get(0)->wasEmployeeChosenBefore() ||
            $employees->values()->get(1)->wasEmployeeChosenBefore()) {
            $employees = Employee::inRandomOrder()->limit(2)->get();
        }

        CleanHistory::create([
            'start_period' => Carbon::now()->startOfWeek()->addDay(),
            'end_period' => Carbon::now()->startOfWeek()->addDay(5)
        ]);

        (new Notify())->notify(new TheChosenOnes($employees->values()->get(0), $employees->values()->get(1)));
    }
}