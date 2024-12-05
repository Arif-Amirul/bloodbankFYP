<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;

    protected $table = 'donate';
    protected $fillable = [
        'user_id',
        'donation_id',
        'donor_id',
        'blood_group',
        'blood_id',
        'donation_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
