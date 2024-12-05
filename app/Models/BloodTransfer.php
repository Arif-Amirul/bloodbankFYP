<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodTransfer extends Model
{
    use HasFactory;
    protected $table = 'blood_transfers';
    protected $fillable = [
        'user_id',
        'transfer_id',
        'transfer_date',
        'location',
        'required_blood_group',
        'patient_id',
        'blood_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
