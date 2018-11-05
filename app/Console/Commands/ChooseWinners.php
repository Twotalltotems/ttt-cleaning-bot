<?php

namespace App\Console\Commands;

use App\Employee;
use App\Notify;
use App\Notifications\TheChosenOnes;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class ChooseWinners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleaning:choose';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Choose cleaners for the week';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $employees = Employee::inRandomOrder()->limit(2)->get();

        if ($employees->count() < 2) {
            return;
        }

        while($employees->values()->get(0)->wasEmployeeChosenBefore() ||
            $employees->values()->get(1)->wasEmployeeChosenBefore()) {
            $employees = Employee::inRandomOrder()->limit(2)->get();
        }

        (new Notify())->notify(new TheChosenOnes($employees->values()->get(0), $employees->values()->get(1)));
    }
}
