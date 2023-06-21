<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Server extends Model
{
    use HasFactory;

    protected $table = 'servers';

    protected $fillable = [
        'name',
        'description',
        'ip'
    ];


    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    public function workers(): BelongsToMany
    {
        return $this->belongsToMany(Worker::class);
    }



}
