<?php

namespace App\Http\Livewire\Home;

use App\Models\BloodInformation;
use App\Models\BloodRequest;
use App\Models\BloodStock;
use App\Models\DonorInformation;
use Livewire\Component;
use App\Models\User;

class Home extends Component
{
    public $data;
    public $bloodAcount;
    public $bloodA_plus;
    public $bloodA_minus;
    public $bloodB_plus;
    public $bloodB_minus;
    public $bloodO_plus;
    public $bloodO_minus;
    public $bloodAB_plus;
    public $bloodAB_minus;
    public $registeredDonorsCount;

    public function render()
    {
        // Fetch count of registered donors
        $this->registeredDonorsCount = DonorInformation::count();

        $bloodA_plus = BloodStock::where('blood_type','A+')->first();
        $bloodA_minus = BloodStock::where('blood_type','A-')->first();
        $bloodO_minus = BloodStock::where('blood_type','O+')->first();
        $bloodO_plus = BloodStock::where('blood_type','O-')->first();
        $bloodAB_plus = BloodStock::where('blood_type','AB+')->first();
        $bloodAB_minus = BloodStock::where('blood_type','AB-')->first();
        $bloodB_plus = BloodStock::where('blood_type','B+')->first();
        $bloodB_minus = BloodStock::where('blood_type','B-')->first();

        $this->bloodA_plus=$bloodA_plus->quantity;
        $this->bloodA_minus=$bloodA_minus->quantity;
        $this->bloodO_plus=$bloodO_plus ->quantity;
        $this->bloodO_minus=$bloodO_minus->quantity;
        $this->bloodAB_plus=$bloodAB_plus->quantity;
        $this->bloodAB_minus=$bloodAB_minus->quantity;
        $this->bloodB_plus=$bloodB_plus->quantity;
        $this->bloodB_minus=$bloodB_minus->quantity;

        return view('livewire.home.home')->extends('layouts.main');
    }
}
