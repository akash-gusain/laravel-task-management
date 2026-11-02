<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=[
        'title',
        'description',
         'priority',
        'due_date',
        'status',
    ];

    public function user():BelongsTo{
            return $this->belongsTo(User::class);
    }
}
