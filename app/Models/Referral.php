<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referral extends Model
{
    use HasFactory, SoftDeletes;

    // Table name (optional if it matches the pluralized form of the model name)
    protected $table = 'referrals';

    // Primary key (optional if it's "id")
    protected $primaryKey = 'id';

    // Mass-assignable attributes
    protected $fillable = [
        'email',
        'user_id',
        'link',
        'opened',
        'purchased',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'opened' => 'boolean', // Tinyint(1) can be cast to boolean
        'purchased' => 'boolean', // Tinyint(1) can be cast to boolean
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Define relationships.
     */

    // Assuming `use_id` refers to a user in a `users` table
    public function user()
    {
        return $this->belongsTo(User::class, 'use_id', 'id');
    }

    /**
     * Additional methods or scopes can go here.
     */
}
