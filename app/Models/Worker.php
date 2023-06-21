<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'workers';

    protected $fillable = [
        'first_name',
        'last_name',
        'job_title',
        'email',
    ];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function servers(): BelongsToMany
    {
        return $this->belongsToMany(Server::class);
    }

}
