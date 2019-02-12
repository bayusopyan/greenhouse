<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaTanam extends Model
{
    protected $table = 'mediatanam';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cahaya',
        'suhu',
        'ph',
        'kt',
        'jam',
        'tanggal'
    ];
}
