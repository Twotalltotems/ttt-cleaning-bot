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

        $employee1 = $employees->values()->get(0);
        $employee2 = $employees->values()->get(1);

        $history = CleanHistory::create([
            'start_period' => Carbon::now()->startOfWeek()->addDay(),
            'end_period' => Carbon::now()->startOfWeek()->addDay(5)
        ]);

        $history->people()->attach($employee1);
        $history->people()->attach($employee2);

        (new Notify())->notify(new TheChosenOnes($employee1, $employee2));
    }
}