<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['user_id', 'language', 'abbreviation', 'ruby'];
    public function dailies() {
        $this->hasMany(Daily::class);
    }
    public function user() {
        $this->belongsTo(User::class);
    }
}
