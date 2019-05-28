<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model {

    /**
     * Attribute default values
     *
     * @var array
     */
    protected $attributes = [
        'id' => 0
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The services that this system belongs to.
     */
    public function services() {
        return $this->belongsToMany('App\Service', 'service_has_systems');
    }

}
