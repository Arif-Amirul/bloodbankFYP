<?php

namespace App\Http\Livewire\BloodTransfer;
use App\Models\BloodInformation;
use App\Models\BloodStock;
use App\Models\BloodTransfer;
use App\Models\Donate;
use App\Models\PatientCollection;
use Livewire\Component;
use WireUi\Traits\Actions;

class BloodTransferPage extends Component
{
    use Actions;
    public $transfer_id;
    public $transfer_date;
    public $location;
    public $required_blood_group;
    public $patient_id;
    public $blood_id;
    public $blood_group;

    public $selectedBloodIds = [];

    // Method to handle blood ID selection change
    // public function updatedBloodId($value)
    // {
    //     if (in_array($value, $this->selectedBloodIds)) {
    //         $this->dialog()->error(
    //             $title = 'Error',
    //             $description = 'This blood ID has already been selected.'
    //         );
    //         // Reset the blood ID selection to prevent duplicates
    //         $this->reset('blood_id');
    //     } else {
    //         // Add the selected blood ID to the array
    //         $this->selectedBloodIds[] = $value;
    //     }
    // }

    // Method to handle patient ID selection change
    public function updatedPatientId($value)
    {
        // Fetch the required blood group based on the selected patient ID
        $patient = PatientCollection::where('patient_id', $value)->first();
        if ($patient) {
            $this->transfer_date = $patient->transfer_date;
            $this->required_blood_group = $patient->required_blood_group;
            $this->location = $patient->location;
        }
    }

    // public function transfer() {

    //     $this->validate([
    //         'transfer_id' => 'required',
    //         'transfer_date' => 'required',
    //         'location' => 'required',
    //         'required_blood_group' => 'required',
    //         'patient_id' => 'required',
    //         'blood_id'=> 'required',

    //     ]);

    //     $bloodStock = BloodStock::where('blood_type', $this->required_blood_group)->first();

    //     if ($bloodStock && $bloodStock->quantity > 0) {
    //         // Deduct from stock only if quantity is available
    //         $updateBloodStock = BloodStock::where('blood_type', $this->required_blood_group)
    //             ->update(['quantity' => $bloodStock->quantity - 1]);

    //             BloodTransfer::create([
    //                 'user_id' => auth()->user()->id,
    //                 'transfer_id'=> $this->transfer_id,
    //                 'transfer_date'=> $this->transfer_date,
    //                 'location'=> $this->location,
    //                 'required_blood_group'=> $this->required_blood_group,
    //                 'patient_id'=> $this->patient_id,
    //                 'blood_id'=> $this->blood_id,
    //             ]);


    //         $this->dialog()->success(
    //             $title = 'Successfully',
    //             $description = 'Blood request successfully.'
    //         );
    //     } else {
    //         // Display error if blood stock is not available
    //         $this->dialog()->error(
    //             $title = 'Error',
    //             $description = 'Blood stock not available.'
    //         );
    //     }

    //         $this->reset([
    //         'transfer_id',
    //         'transfer_date',
    //         'location',
    //         'required_blood_group',
    //         'patient_id',
    //         'blood_id',
    //     ]);


    // }

    public function transfer() {
        $this->validate([
            'transfer_id' => 'required',
            'transfer_date' => 'required',
            'location' => 'required',
            'required_blood_group' => 'required',
            'patient_id' => 'required',
            'blood_id'=> 'required',
        ]);

        $bloodInfo = BloodInformation::where('blood_id', $this->blood_id)->first();

        if ($bloodInfo && $bloodInfo->blood_group === $this->required_blood_group) {
            $bloodStock = BloodStock::where('blood_type', $this->required_blood_group)->first();

            if ($bloodStock && $bloodStock->quantity > 0) {
                // Deduct from stock only if quantity is available
                $updateBloodStock = BloodStock::where('blood_type', $this->required_blood_group)
                    ->update(['quantity' => $bloodStock->quantity - 1]);

                BloodTransfer::create([
                    'user_id' => auth()->user()->id,
                    'transfer_id'=> $this->transfer_id,
                    'transfer_date'=> $this->transfer_date,
                    'location'=> $this->location,
                    'required_blood_group'=> $this->required_blood_group,
                    'patient_id'=> $this->patient_id,
                    'blood_id'=> $this->blood_id,
                ]);

                $this->dialog()->success(
                    $title = 'Successfully',
                    $description = 'Blood request successfully.'
                );
            } else {
                // Display error if blood stock is not available
                $this->dialog()->error(
                    $title = 'Error',
                    $description = 'Blood stock not available.'
                );
            }
        } else {
            // Display error if the selected blood ID doesn't match the required blood group
            $this->dialog()->error(
                $title = 'Error',
                $description = 'Selected blood ID does not match the required blood group.'
            );
        }

        $this->reset([
            'transfer_id',
            'transfer_date',
            'location',
            'required_blood_group',
            'patient_id',
            'blood_id',
        ]);
    }


    public function render()
    {
        $patientOptions = PatientCollection::select('patient_id', 'patient_full_name')
            ->distinct()
            ->get()
            ->pluck('patient_full_name', 'patient_id'); // Fetch unique patient IDs with full names

         // Fetch blood_id and blood_status from tables using join
            $bloodData = Donate::join('blood_information', 'donate.blood_id', '=', 'blood_information.blood_id')
            ->select('donate.blood_id', 'blood_information.blood_status')
            ->where('blood_information.blood_status', '=', 'approved')
            ->distinct()
            ->get();

        // Prepare an associative array of bloodid => bloodstatus
        $bloodIds = [];
        foreach ($bloodData as $data) {
            $bloodIds[$data->blood_id] = $data->blood_status;
        }

        return view('livewire.blood-transfer.blood-transfer-page', [
            'patientOptions' => $patientOptions,
            'bloodIds' => $bloodIds, // Pass the associative array containing bloodid => bloodstatus
        ])->extends('layouts.main');
    }
}
