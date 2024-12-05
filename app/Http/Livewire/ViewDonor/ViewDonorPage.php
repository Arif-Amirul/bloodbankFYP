<?php

namespace App\Http\Livewire\ViewDonor;

use Livewire\Component;
use App\Models\DonorInformation;
use WireUi\Traits\Actions;

class ViewDonorPage extends Component
{
    use Actions;
    public $updateModal = false;
    public $viewMoreModal = false;
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
    public $identification_number;
    public $donor;

    public function openModalViewMore($id){
        $this->viewMoreModal = true;
        $this->donor = DonorInformation::find($id);
        $this->marital_status =  $this->donor->marital_status;
        $this->date =  $this->donor->date;
        $this->gender =   $this->donor->gender;
        $this->race =  $this->donor->race;
        $this->street_address =  $this->donor->street_address;
        $this->city =   $this->donor->city;
        $this->state =   $this->donor->state;
        $this->postal_code =   $this->donor->postal_code;
    }

    public function openModalUpdate($id){
        $this->updateModal = true;
        $this->donor = DonorInformation::find($id);
        $this->donor_id =   $this->donor->donor_id;
        $this->full_name =  $this->donor->full_name;
        $this->identification_number=   $this->donor->identification_number;
        $this->phone_number =   $this->donor->phone_number;
        $this->blood_group =   $this->donor->blood_group;
        $this->marital_status =  $this->donor->marital_status;
        $this->date =  $this->donor->date;
        $this->gender =   $this->donor->gender;
        $this->race =  $this->donor->race;
        $this->street_address =  $this->donor->street_address;
        $this->city =   $this->donor->city;
        $this->state =   $this->donor->state;
        $this->postal_code =   $this->donor->postal_code;
    }

    public function update($id){
        $this->donor->update([
            'donor_id' => $this->donor_id,
            'full_name' => $this->full_name,
            'identification_number' => $this->identification_number,
            'phone_number' => $this->phone_number,
            'marital_status' => $this->marital_status,
            'date' => $this->date,
            'gender' => $this->gender,
            'race' => $this->race,
            'street_address' => $this->street_address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'blood_group' => $this->blood_group,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->updateModal = false;

        // $this->dialog([
        //     'title'       => 'Data Updated!',
        //     'description' => 'Data was successfully updated',
        //     'icon'        => 'success'
        // ]);
    }

    public function delete($id){

        $donor = DonorInformation::find($id);
        $donor->delete();
        $this->donor_id = $donor->donor_id;
        $this->full_name = $donor->full_name;
        $this->identification_number= $donor->identification_number;
        $this->phone_number = $donor->phone_number;
        $this->marital_status = $donor->marital_status;
        $this->date = $donor->date;
        $this->gender = $donor->gender;
        $this->race = $donor->race;
        $this->street_address = $donor->street_address;
        $this->city = $donor->city;
        $this->state = $donor->state;
        $this->postal_code = $donor->postal_code;
        $this->blood_group = $donor->blood_group;

        // $bloodStock = BloodStock::where('blood_type' ,$this->blood_group )->first();

        // $updateBloodStock = BloodStock::where('blood_type' ,$this->blood_group )
        //             ->update(['quantity' => $bloodStock->quantity -1]);

        $this->dialog([
            'title'       => 'Data Deleted!',
            'description' => 'Data was successfully deletec',
            'icon'        => 'success'
        ]);
    }

    public function render()
    {
        $Donor = DonorInformation::all();

        return view('livewire.view-donor.view-donor-page', [
            'data' =>    $Donor,

        ])->extends('layouts.main');
    }
}
