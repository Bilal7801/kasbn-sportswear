<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'enquiry_type',
        'product_category',
        'quantity',
        'message',
        'ip_address',
        'country',
        'country_code',
        'city',
        'device',
        'browser',
        'status',
    ];

    // app/Models/Enquiry.php

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'email', 'email');
    }
}
