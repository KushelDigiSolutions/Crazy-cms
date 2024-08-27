<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use SoftDeletes;

    protected $fillable = ['my_site_id', 'user_id', 'pagename', 'content'];

    public function getNameAttribute()
    {
        return $this->pagename . '-' . $this->created_at->format('Y-m-d');
    }
}
