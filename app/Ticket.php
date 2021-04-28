<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    // on définit la table tickets
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tickets';
    protected $fillable = [
        'list_id'
    ];
    protected $primaryKey = 'id'; //primary key de tickets

    public function comments()
    {
        return $this->hasOne('List');
    }
}
