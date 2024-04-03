<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Events\InbraakMeldingCreated;

class inbraakMelding extends Model
{
    use HasFactory;


    protected $fillable = [
        'sensor_id',
        'user_id',
    ];
    protected $dispatchesEvents = [
        'created' => InbraakMeldingCreated::class,
    ];
    
    public function user():BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
}
