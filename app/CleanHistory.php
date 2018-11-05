<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CleanHistory extends Model
{
    protected $fillable = [
        'start_period',
        'end_period',
    ];

    /**
     * People notes property.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function people()
    {
        return $this->belongsToMany('App\Employee', 'clean_history_employee', 'clean_history_id', 'employee_id');
    }
}
