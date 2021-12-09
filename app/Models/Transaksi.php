<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Transaksi extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_transaksi';

    protected $table = 'transaksi';

    protected $fillable = [
        'id_user',
        'id_barber',
        'tgl_reservasi',
        'jam_reservasi',
        'total_waktu',
        'total_biaya',
    ];

    /**
     * Returns the user this transaksi belongs to
     *
     * @return  \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * Returns the barber this transaksi belongs to
     *
     * @return  \App\Models\Barber
     */
    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber', 'id');
    }

    public function transaksiDetail()
    {
        return $this->hasMany(TransaksiDetail::class, 'id_detail', 'id');
    }

    // public function scopeBookable($q, $notice = 0)
    // {
    //     $q->where('jam_reservasi', '>', Carbon::now()->addMinutes($notice))->orderBy('jam_reservasi', 'ASC')->get();
    // }
}
