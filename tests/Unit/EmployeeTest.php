<?php
/**
 * Created by PhpStorm.
 * User: felipepena
 * Date: 2018-11-02
 * Time: 12:34
 */

namespace Tests\Unit;

use App\CleanHistory;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use DatabaseMigrations;

    protected $employee;

    public function setUp()
    {
        parent::setUp();
        $this->employee = create('App\Employee');
    }

    /** @test */
    public function an_employee_can_check_if_he_was_chosen_before()
    {
        $this->assertFalse($this->employee->wasEmployeeChosenBefore());

        $history = create('App\CleanHistory');
        $history->people()->attach($this->employee->id);

        $this->assertTrue($this->employee->wasEmployeeChosenBefore());
    }
}