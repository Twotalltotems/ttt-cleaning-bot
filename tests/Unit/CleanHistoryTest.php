<?php
/**
 * Created by PhpStorm.
 * User: felipepena
 * Date: 2018-11-02
 * Time: 10:51
 */

 namespace Tests\Unit;

 use Carbon\Carbon;
 use Illuminate\Foundation\Testing\DatabaseMigrations;
 use Tests\TestCase;

 class CleanHistoryTest extends TestCase
 {
     use DatabaseMigrations;

     protected $cleanHistory;

     public function setUp()
     {
         parent::setUp();
         $this->cleanHistory = create('App\CleanHistory');
     }

     /** @test */
     public function a_clean_history_instance_has_people()
     {
         $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->cleanHistory->people);
     }
 }