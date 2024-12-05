<?php

namespace App\Http\Livewire\ViewDonate;

use Livewire\Component;
use App\Models\Donate;
use App\Models\BloodStock;
use App\Models\BloodInformation;
use WireUi\Traits\Actions;

class ViewDonatePage extends Component
{
    use Actions;
    public $updateModal = false;
    public $donation_id;
    public $donor_id;
    public $blood_group;
    public $blood_id;
    public $donation_date;
    public $donation;
    // public $updateModalTest = false;
    // public $viewModalTest = false;

    // public function openModalBloodTest()
    // {
    //     $this->updateModalTest = true;
    // }

    // public function viewModalBloodTest()
    // {

    //     $this->viewModalTest = true;
    // }

    public function openModalUpdate($id){
        $this->updateModal = true;
        $this->donation = Donate::find($id);
        $this->donation_id =   $this->donation->donation_id;
        $this->blood_group=   $this->donation->blood_group;
        $this->blood_id =   $this->donation->blood_id;
        $this->donation_date=   $this->donation->donation_date;
    }

    public function update($id){
        $this->donation->update([
            'donation_id' => $this->donation_id,
            'blood_group' => $this->blood_group,
            'blood_id' => $this->blood_id,
            'donation_date' => $this->donation_date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->updateModal = false;

        $this->dialog([
            'title'       => 'Data Updated!',
            'description' => 'Data was successfully updated',
            'icon'        => 'success'
        ]);
    }


    public function delete($id){

        $donation = Donate::find($id);
        $donation->delete();
        $this->donation_id = $donation->full_name;
        $this->donor_id = $donation->donor_id;
        $this->blood_group= $donation->blood_group;
        $this->blood_id = $donation->blood_id;
        $this->donation_date = $donation->donation_date;

        // $bloodStock = BloodStock::where('blood_type' ,$this->blood_group )->first();

        // $updateBloodStock = BloodStock::where('blood_type' ,$this->blood_group )
        //         ->update(['quantity' => $bloodStock->quantity -1]);

        $this->dialog([
        'title'       => 'Data Deleted!',
        'description' => 'Data was successfully deletec',
        'icon'        => 'success'
    ]);
}
    public function render()
    {
        $donation = Donate::all();

        return view('livewire.view-donate.view-donate-page', [
            'datadonate' =>    $donation,

        ])->extends('layouts.main');
    }
}
