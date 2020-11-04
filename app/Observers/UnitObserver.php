<?php

namespace App\Observers;

use App\Unit;
use Illuminate\Support\Facades\Schema;

class UnitObserver
{
    /**
     * Handle the unit "created" event.
     *
     * @param  \App\Unit  $unit
     * @return void
     */
    public function created(Unit $unit)
    {

        $unit->floor()->create([
            'image'=>0,
            'bedroom'=>0,
            'kitchen'=>0,
            'sitting'=>0,
        ]);
    }

    /**
     * Handle the unit "updated" event.
     *
     * @param  \App\Unit  $unit
     * @return void
     */
    public function updated(Unit $unit)
    {
        //
    }

    /**
     * Handle the unit "deleted" event.
     *
     * @param  \App\Unit  $unit
     * @return void
     */
    public function deleted(Unit $unit)
    {
        //
    }

    /**
     * Handle the unit "restored" event.
     *
     * @param  \App\Unit  $unit
     * @return void
     */
    public function restored(Unit $unit)
    {
        //
    }

    /**
     * Handle the unit "force deleted" event.
     *
     * @param  \App\Unit  $unit
     * @return void
     */
    public function forceDeleted(Unit $unit)
    {
        //
    }
}
