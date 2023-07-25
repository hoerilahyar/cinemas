<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'genre_id',
        'title',
        'synopsis',
        'cast',
        'director',
        'plot',
        'release_year',
        'rating',
        'movie_length',
        'show_date',
        'thumbnail',
        'preview',
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
        'release_year'=>'date:Y',
        'show_date'=>'date:Y-m-d',
    ];

    /**
     * Get the schedules for the movie.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Get the genre that owns the movie.
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
