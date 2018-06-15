<?php

namespace appCodex;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'unidade';
    protected $primaryKey = 'idunidade';

    public $timestamps = false;
    
    protected $fillable = [
      'nome',
      'campus',
      'status'
    ];

    protected $guarded[];
}
