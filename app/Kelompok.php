<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompok';
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
    ];  
}
