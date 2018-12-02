<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Daily;

class Grammar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['grammar', 'example', 'explanation', 'daily_id', 'example_translation'];
    
    public function daily()
    {
        return $this->belongsTo(Daily::class);
    }
}
