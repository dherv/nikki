<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Word;
use App\Grammar;
use App\User;

class Daily extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'user_id', 'language_id'];


    // public function language(){
    //     return $this->belongsTo(Language::class);
    // }
    public function words() {
        return $this->hasMany(Word::class);
    }
    public function grammars() {
        return $this->hasMany(Grammar::class);
    }
    public function scopeLanguage($query)
    {
        $user = User::find(1);
        return $query->where('language_id', '=',$user->language_id);
    }
}

// TODO: create word model link to each daily
// TODO: create definition for each word ?
