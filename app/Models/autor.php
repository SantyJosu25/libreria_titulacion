<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'autors';

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
    protected $fillable = ['Nombre', 'Apellido', 'libro_id'];

    public function libro()
    {
        return $this->belongsTo('App\Models\libro');
    }
    
}
