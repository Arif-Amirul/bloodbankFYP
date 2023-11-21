<?php

namespace App\Http\Livewire\Donor;
use App\Models\DonorInformation;
use App\Models\BloodStock;
use Livewire\Component;
use WireUi\Traits\Actions;

class DonorPage extends Component
{
    use Actions;
    public $donor_id;
    public $blood_group;
    public $full_name;
    public $phone_number;
    public $marital_status;
    public $date;
    public $gender;
    public $race;
    public $street_address;
    public $city;
    public $state;
    public $postal_code;
    public $donation_date;

    public function create() {

        $this->validate([
            'donor_id' => 'required',
            'blood_group'  => 'required',
            'full_name' => 'required',
            'phone_number'  => 'required',
            'marital_status' => 'required',
            'date'  => 'required',
            'gender' => 'required',
            'race'  => 'required',
            'street_address'  => 'required',
            'city'  => 'required',
            'state'  => 'required',
            'postal_code'   => 'required',
            'donation_date' => 'required',
        ]);

        DonorInformation::create([
            'user_id' => auth()->user()->id,
            'donor_id' => $this->donor_id,
            'blood_group' => $this->blood_group,
            'full_name' => $this->full_name,
            'phone_number' => $this->phone_number,
            'marital_status' => $this->marital_status,
            'date' => $this->date,
            'gender' => $this->gender,
            'race' => $this->race,
            'street_address' => $this->street_address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'donation_date' => $this->donation_date,
        ]);

        $bloodStock = BloodStock::where('blood_type' ,$this->blood_group )->first();

        $updateBloodStock = BloodStock::where('blood_type' ,$this->blood_group )
                    ->update(['quantity' => $bloodStock->quantity + 1]);


        $this->dialog()->success(
            $title = 'Successfully',
            $description = 'Blood collection added succesfully.'
        );

        $this->donor_id = '';
        $this->blood_group = '';
        $this->full_name = '';
        $this->phone_number = '';
        $this->marital_status = '';
        $this->date = '';
        $this->gender = '';
        $this->race = '';
        $this->street_address = '';
        $this->city = '';
        $this->state = '';
        $this->postal_code = '';
        $this->donation_date = '';


    }
    public function render()
    {
        return view('livewire.donor.donor-page')->extends('layouts.main');
    }
}
