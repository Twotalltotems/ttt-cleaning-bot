<?php

namespace Tests\Feature;

use App\Cleaner;
use App\CleanHistory;
use App\Employee;
use Illuminate\Support\Facades\Notification;
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
        Notification::fake();

        $history = CleanHistory::all();

        $this->assertTrue($history->count() == 0);

        create(Employee::class, [], 2);

        Cleaner::chooseCleaners();

        $history = CleanHistory::all();

        $this->assertTrue($history->count() > 0);

        $this->assertTrue($history->first()->people->count() == 2);
    }

    /** @test */
    public function a_cleaner_will_generate_cleaners_with_proper_employees()
    {
        Notification::fake();

        $employee1 = create(Employee::class, ['active' => 1]);
        $employee2 = create(Employee::class, ['active' => 1]);
        $employee3 = create(Employee::class, ['active' => 0]);

        Cleaner::chooseCleaners();

        $history = CleanHistory::all();

        $firstPeople = $history->first()->people->first();
        $this->assertTrue($firstPeople->email == $employee1->email || $firstPeople->email == $employee2->email);
    }
}
