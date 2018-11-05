<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email'
    ];

    public function wasEmployeeChosenBefore($weeksBefore = 12)
    {
        $historyList = CleanHistory::take($weeksBefore)->get();

        foreach ($historyList as $history) {
            if ($history->people->contains($this->id)) {
                return true;
            }
        }

        return false;
    }
}
