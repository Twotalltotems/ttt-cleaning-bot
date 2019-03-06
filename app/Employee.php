<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }

    public function wasEmployeeChosenBefore($weeksBefore = 12)
    {
        $historyList = CleanHistory::orderBy('id', 'desc')
            ->take($weeksBefore)
            ->get();

        foreach ($historyList as $history) {
            if ($history->people->contains($this->id)) {
                return true;
            }
        }

        return false;
    }
}
