<?php

namespace App\Console\Commands;

use App\Cleaner;
use Illuminate\Console\Command;

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
        Cleaner::chooseCleaners();
    }
}
