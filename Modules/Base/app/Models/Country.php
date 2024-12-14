<?php

namespace Modules\Base\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    public $timestamps = false;

    protected $appends = ['flag'];
    protected $fillable = ['name', 'iso_code_2', 'iso_code_3', 'phone_code'];

    public function getFlagAttribute() {
        $iso = strtolower($this->attributes['iso_code_2']);
        return asset("images/flags/$iso.svg");
    }
}
