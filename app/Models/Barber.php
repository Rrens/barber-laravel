<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{

    protected $table = 'barber';
    protected $primaryKey = 'id_barber';
    protected $fillable = ['nama_barber', 'alamat', 'link',];
    /**
     * Returns the province this city belongs to
     *
     * @return  \App\Models\Transaksi
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }
}
