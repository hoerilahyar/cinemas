<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'movie_id',
        'date',
        'time',
        'price',
        'discount',
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
        'date'=>'date:Y-m-d',
        'time'=>'datetime:H:i:s',
    ];

    /**
     * Get the movie that owns the Schedule.
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * Get the seats for the Schedule.
     */
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    /**
     * Get the bookings for the Schedule.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
