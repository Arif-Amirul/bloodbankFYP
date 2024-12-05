<?php

namespace App\Http\Livewire\ViewBloodRequest;
use App\Models\BloodTransfer;
use App\Models\PatientCollection;
use WireUi\Traits\Actions;
use Livewire\Component;

class ViewBloodRequestPage extends Component
{
    use Actions;
    public $updateModal = false;
    public $viewMoreModal = false;
    public $transfer_id;
    public $transfer_date;
    public $location;
    public $required_blood_group;
    public $patient_id;
    public $blood_id;
    public $transfer;

    public $details = false;
    public $detailTransfer;
    public $patient_full_name;
    public $date;
    public $phone_number;
    public $gender;
    public $contact;

    public function openModalDetail($id){
        $this->details = true;
        $this->detailTransfer = BloodTransfer::find($id);

        if ($this->detailTransfer) {
            $patientId = $this->detailTransfer->patient_id;

            // Fetch PatientCollection record based on patient_id
            $patientRecord = PatientCollection::where('patient_id', $patientId)->first();

            if ($patientRecord) {
                // Accessing the fields from PatientCollection
                $this->patient_id = $patientRecord->patient_id;
                $this->patient_full_name = $patientRecord->patient_full_name;
                $this->date = $patientRecord->date;
                $this->phone_number = $patientRecord->phone_number;
                $this->gender = $patientRecord->gender;
                $this->required_blood_group = $patientRecord->required_blood_group;
                $this->location = $patientRecord->location;
                $this->contact = $patientRecord->contact;
                $this->transfer_date = $patientRecord->transfer_date;
                // You might assign other fields similarly if needed
            } else {
                // Handle the case where PatientCollection with the given patient_id is not found
                // Set default values or show an error message
                $this->patient_id = '';
                $this->patient_full_name = '';
                $this->date = '';
                $this->phone_number = '';
                $this->gender = '';
                $this->required_blood_group = '';
                $this->location = '';
                $this->contact = '';
                $this->transfer_date = '';
                // Handle other fields similarly if needed
            }
        } else {
            // Handle the case where the BloodTransfer record with the given ID is not found
            // Set default values or show an error message
            $this->patient_full_name = '';
            $this->date = '';
            $this->phone_number = '';
            $this->gender = '';
            // Handle other fields similarly if needed
        }
    }

    public function delete($id){
        $transfer = BloodTransfer::find($id);

        if ($transfer) {
            $transfer->delete();
            $this->dialog([
                'title'       => 'Data Deleted!',
                'description' => 'Data was successfully deleted',
                'icon'        => 'success'
            ]);
        } else {
            // Handle the case where the BloodTransfer with the given ID is not found
            $this->dialog([
                'title'       => 'Error!',
                'description' => 'Blood Transfer not found',
                'icon'        => 'error'
            ]);
        }
    }

    public function render()
    {
        $transfer = BloodTransfer::all();

        return view('livewire.view-blood-request.view-blood-request-page', [
            'datatransfer' =>    $transfer,

        ])->extends('layouts.main');
    }
}
