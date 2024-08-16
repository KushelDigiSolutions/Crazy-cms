<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MySite extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'name','protocol','host','port','url','user'.'password','location','status','user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
