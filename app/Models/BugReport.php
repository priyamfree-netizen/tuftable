<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BugReport extends Model
{
    protected $guarded = ['id'];

    public static array $categories = [
        'reports'        => 'Reports Not Working',
        'orders'         => 'Orders / POS Issue',
        'payments'       => 'Payment Issue',
        'menu'           => 'Menu / Items Issue',
        'printer'        => 'Printer Issue',
        'reservations'   => 'Reservations Issue',
        'login'          => 'Login / Access Issue',
        'performance'    => 'Slow Performance',
        'other'          => 'Other',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
