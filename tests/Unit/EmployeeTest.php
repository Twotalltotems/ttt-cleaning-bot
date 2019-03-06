<?php
/**
 * Created by PhpStorm.
 * User: felipepena
 * Date: 2018-11-02
 * Time: 12:34
 */

namespace Tests\Unit;

use App\CleanHistory;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use DatabaseMigrations;

    protected $employee1;
    protected $employee2;
    protected $employee3;
    protected $employee4;


    public function setUp()
    {
        parent::setUp();
        $this->employee1 = create('App\Employee');
        $this->employee2 = create('App\Employee');
        $this->employee3 = create('App\Employee');
        $this->employee4 = create('App\Employee');
    }

    /** @test */
    public function employee_model_has_a_scope()
    {
        $this->assertEquals(4, Employee::all()->count());

        create('App\Employee', [
            'active' => 0
        ]);

        $this->assertEquals(4, Employee::all()->count());

        create('App\Employee', [
            'active' => 1
        ]);

        $this->assertEquals(5, Employee::all()->count());
    }

    /** @test */
    public function an_employee_can_check_if_he_was_chosen_before()
    {
        $this->assertFalse($this->employee1->wasEmployeeChosenBefore(1));

        $history = create('App\CleanHistory');
        $history->people()->attach($this->employee1->id);
        $history->people()->attach($this->employee2->id);

        $this->assertTrue($this->employee1->wasEmployeeChosenBefore(1));
        $this->assertTrue($this->employee1->wasEmployeeChosenBefore(1));

        $history1 = create('App\CleanHistory');
        $history1->people()->attach($this->employee3->id);
        $history1->people()->attach($this->employee4->id);

        // $employee1 was chosen before, but not within the last 1 "weeks"
        $this->assertFalse($this->employee1->wasEmployeeChosenBefore(1));

        // $employee2 was chosen in the last 1 "weeks"
        $this->assertTrue($this->employee3->wasEmployeeChosenBefore(1));
    }
}