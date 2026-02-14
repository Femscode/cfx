<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferredUsers extends Model
{
    protected $guarded = [];
    protected $table = 'referred_users';

    /**
     * Get the user who referred this user.
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referral_id', 'referral_link');
    }
}
