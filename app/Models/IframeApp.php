<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IframeApp extends Model
{
    protected $fillable = [
        'name','slug','url','allowed_origins','require_auth',
        'pass_user_context','description','is_active','approved_by','approved_at'
    ];

    protected $casts = [
        'allowed_origins' => 'array',
        'approved_at' => 'datetime',
    ];

    public function approver() { return $this->belongsTo(User::class, 'approved_by'); }
}
