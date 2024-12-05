<?php

namespace App\Http\Livewire\Donation;
use App\Models\Donate;
use App\Models\BloodStock;
use Livewire\Component;
use App\Models\DonorInformation;
use WireUi\Traits\Actions;

class DonationPage extends Component
{
    use Actions;
    public $donation_id;
    public $donor_id;
    public $blood_group;
    public $blood_id;
    public $donation_date;

    public function fetchBloodGroup()
    {
        if ($this->donor_id) {
            $donorInfo = DonorInformation::where('donor_id', $this->donor_id)->first();
            if ($donorInfo) {
                $this->blood_group = $donorInfo->blood_group;
            }
        }
    }

    public function create() {

        $this->validate([
            'donation_id' => 'required',
            'donor_id' => 'required',
            'blood_group'  => 'required',
            'blood_id'  => 'required',
            'donation_date'  => 'required',
        ]);

        Donate::create([
            'user_id' => auth()->user()->id,
            'donation_id' => $this->donation_id,
            'donor_id' => $this->donor_id,
            'blood_group' => $this->blood_group,
            'blood_id' => $this->blood_id,
            'donation_date' => $this->donation_date,
        ]);

        // $bloodStock = BloodStock::where('blood_type' ,$this->blood_group )->first();

        // $updateBloodStock = BloodStock::where('blood_type' ,$this->blood_group )
        //         ->update(['quantity' => $bloodStock->quantity + 1]);

        $this->reset([
            'donation_id',
            'donor_id',
            'blood_group',
            'blood_id',
            'donation_date',
        ]);

        $this->dialog()->success(
            $title = 'Successfully',
            $description = 'Donate added succesfully.'
        );



}
    public function render()
    {
        $donorOptions = DonorInformation::select('donor_id', 'full_name')
        ->distinct()
        ->get()
        ->pluck('full_name', 'donor_id'); // Fetch unique donor IDs with full names

        return view('livewire.donation.donation-page', [
            'donorOptions' => $donorOptions,
        ])->extends('layouts.main');
    }
}
