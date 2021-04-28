<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    // on définit la table lists
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lists';
    protected $fillable = [
        'board_id'
    ];
    protected $primaryKey = 'id'; //primary key de lists



    public function tickets()
    {
        return $this->hasMany('Ticket');
    }

    public function listss()
    {
        return $this->belongsTo('App\Board');
    }
}
