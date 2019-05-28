<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

    protected $attributes = ['id' => 0];
    protected $fillable = ['name'];

    
    public function parent() {
        return $this->belongsTo('App\Service', 'parent_id');
    }
    
    public function children() {
        return $this->hasMany('App\Service', 'parent_id');
    }

    /**
     * The systems that belong to this service.
     */
    public function systems() {
        return $this->belongsToMany('App\System', 'service_has_systems');
    }

}
