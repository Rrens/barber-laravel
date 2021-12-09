<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiDetail extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table  = 'detail_transaksi';

    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_layanan',
        'id_transaksi'
    ];

    /**
     * Returns the product this transaksi detail belongs to
     *
     * @return  \App\Models\Layanan
     */
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }

    /**
     * Returns the transaksi this transaksi detail belongs to
     *
     * @return  \App\Models\Transaksi
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }

    public function price()
    {
        return $this->hasOne(Layanan::class, 'id_detail')
            ->join('layanan as l', 'id_layanan', '=', 'l.id')
            ->groupBy('id_detail')
            ->selectRaw('id_detail,IFNULL(SUM(layanan.harga), 0) as total_harga');
    }
}
