<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            ['Chris Hobbs', 'Chris@twotalltotems.com'],
            ['David Hobbs', 'david@twotalltotems.com'],
            ['Jose Hernandez Castilla', 'jose.hernandez@twotalltotems.com'],
            ['Man Yee Wong' , 'Josephine@twotalltotems.com'],
            ['Zhida	Li'	, 'vinson@twotalltotems.com'],
            ['Chin King Cheng', 'felix.cheng@twotalltotems.com'],
            ['Jordan Chin', 'jordan.chin@twotalltotems.com'],
            ['Mark Wilson', 'mark.wilson@twotalltotems.com'],
            ['Pauline Lee', 'pauline.lee@twotalltotems.com'],
            ['Richard Hoang', 'richard.hoang@twotalltotems.com'],
            ['So Mang Kang', 'ann.kang@twotalltotems.com'],
            ['Tian Jia', 'jatin.jia@twotalltotems.com'],
            ['Magnus Lu', 'magnus.lu@twotalltotems.com'],
            ['Yi Yun Zhao', 'evian.zhao@twotalltotems.com'],
            ['Yu-An	Lin', 'andrealin110@gmail.com'],
            ['Gokul Raj	Suresh Kumar', 'gokul.kumar@twotalltotems.com'],
            ['Lara Rode', 'lara.rode@twotalltotems.com'],
            ['Nomin Oyun', 'nomin.oyun@twotalltotems.com'],
            ['Oleg Shinkarev', 'oleg.shinkarev@twotalltotems.com'],
            ['Robert Sebenda', 'robert.sebenda@twotalltotems.com'],
            ['Vincent Sheu', 'vincent.sheu@twotalltotems.com'],
            ['Wali Usmani', 'Wali@twotalltotems.com'],
            ['Enxin Yao' , 'anson.yao@twotalltotems.com'],
            ['Felipe Pena', 'felipe.pena@twotalltotems.com'],
            ['Feyza Demir', 'feyza.nurdemir@twotalltotems.com'],
            ['Gordon Zhang', 'gordon.zhang@twotalltotems.com'],
            ['Ling Zhang', 'ling.zhang@twotalltotems.com'],
            ['Mitchell Ganton', 'mitchell.ganton@twotalltotems.com'],
            ['Vitor	Pena', 'vitor@twotalltotems.com'],
            ['Wanqiao Wu', 'becky.wu@twotalltotems.com'],
            ['Zhen Wang', 'zhen.wang@twotalltotems.com']
        ];

        foreach ($employees as $employee) {
            Employee::create([
                'name' => $employee[0],
                'email' => $employee[1],
            ]);
        }
    }
}