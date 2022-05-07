<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * NOTE: $fillable is not currently in use, here in preparation for a future
     * database connection
     *
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'type',
        'breed',
        'breedType',
        'gender'
    ];
}
