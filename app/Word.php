<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Daily;

class Word extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['word', 'translation', 'ruby', 'daily_id'];

    public function daily() {
        return $this->belongsTo(Daily::class);
    }
}
