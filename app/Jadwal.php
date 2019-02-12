<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nama',
        'tgl_masuk',
        'tgl_keluar',
        'kelompok',
        'tanaman',
        'jumlah_tanaman',
        'status',
    ]; 
}
