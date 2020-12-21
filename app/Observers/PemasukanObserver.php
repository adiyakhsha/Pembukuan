<?php

namespace App\Observers;

use App\Models\Pemasukan;

class PemasukanObserver
{
    /**
     * Handle the Pemasukan "created" event.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return void
     */
    public function created(Pemasukan $pemasukan)
    {
        $pemasukan->transaksi->increment('masuk', $pemasukan->saldo_pemasukan);
    }

    /**
     * Handle the Pemasukan "updated" event.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return void
     */
    public function updated(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Handle the Pemasukan "deleted" event.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return void
     */
    public function deleted(Pemasukan $pemasukan)
    {
        $pemasukan->transaksi->decrement('masuk', $pemasukan->saldo_pemasukan);
    }

    /**
     * Handle the Pemasukan "restored" event.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return void
     */
    public function restored(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Handle the Pemasukan "force deleted" event.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return void
     */
    public function forceDeleted(Pemasukan $pemasukan)
    {
        //
    }
}
