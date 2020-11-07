<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'libros';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ISBN', 'Titulo', 'Fecha', 'PVP', 'editorial_id'];

    public function Editorial()
    {
        return $this->belongsTo('App\Models\Editorial');
    }
    
}
