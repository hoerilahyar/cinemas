<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'schedule_id',
        'theater_id',
        'available_seat',
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'available_seat'=>'object'
    ];

    /**
     * Get the schedule that owns the seat.
     */
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    /**
     * Get the theater that owns the seat.
     */
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
}
