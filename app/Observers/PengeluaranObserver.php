<?php

namespace App\Observers;

use App\Models\Pengeluaran;

class PengeluaranObserver
{
    /**
     * Handle the Pengeluaran "created" event.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return void
     */
    public function created(Pengeluaran $pengeluaran)
    {
        $pengeluaran->transaksi->increment('keluar', $pengeluaran->serba_serbi + $pengeluaran->hutang_dagang - $pengeluaran->pot_pembelian);
    }

    /**
     * Handle the Pengeluaran "updated" event.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return void
     */
    public function updated(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Handle the Pengeluaran "deleted" event.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return void
     */
    public function deleted(Pengeluaran $pengeluaran)
    {
        $pengeluaran->transaksi->decrement('keluar', $pengeluaran->serba_serbi + $pengeluaran->hutang_dagang - $pengeluaran->pot_pembelian);
    }

    /**
     * Handle the Pengeluaran "restored" event.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return void
     */
    public function restored(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Handle the Pengeluaran "force deleted" event.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return void
     */
    public function forceDeleted(Pengeluaran $pengeluaran)
    {
        //
    }
}
