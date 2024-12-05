<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodInformation extends Model
{
    use HasFactory;

    protected $table = 'blood_information';
    protected $fillable = [
        'user_id',
        'test_id',
        'blood_id',
        'blood_group',
        'date',
        'white_blood_cells',
        'red_blood_cells',
        'haemoglobin',
        'hematrocrit',
        'platelets',
        'hiv_test',
        'sodium',
        'potassium',
        'calcium',
        'blood_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
