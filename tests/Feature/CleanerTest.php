<?php

namespace Tests\Feature;

use App\Cleaner;
use App\CleanHistory;
use App\Employee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CleanerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_cleaner_cannot_generate_cleaners_if_there_are_no_employees()
    {
        Cleaner::chooseCleaners();

        $history = CleanHistory::all();

        $this->assertTrue($history->count() == 0);
    }

    /** @test */
    public function a_cleaner_can_generate_cleaners()
    {
        create(Employee::class, [], 2);

        Cleaner::chooseCleaners();

        $history = CleanHistory::all();

        $this->assertTrue($history->count() > 0);

        $this->assertTrue($history->first()->people->count() == 2);
    }
}
