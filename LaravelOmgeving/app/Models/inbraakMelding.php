<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\InbraakMeldingCreated;

class inbraakMelding extends Model
{
    use HasFactory;


    protected $fillable = [
        'sensor_id',
    ];
    protected $dispatchesEvents = [
        'created' => InbraakMeldingCreated::class,
    ];
}
