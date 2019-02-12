<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'tanaman';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'id',
        'nama',
        'keterangan',
    ];  
}
