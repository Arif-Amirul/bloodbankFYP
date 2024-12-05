<?php

namespace App\Http\Livewire\ViewPatient;
use App\Models\PatientCollection;
use Livewire\Component;
use WireUi\Traits\Actions;

class ViewPatientPage extends Component
{
    use Actions;
    public $updateModal = false;
    public $viewMoreModal = false;
    public $patient_id;
    public $patient_full_name;
    public $date;
    public $phone_number;
    public $gender;
    public $required_blood_group;
    public $location;
    public $contact;
    public $transfer_date;
    public $patient;

    public function openModalViewMore($id){
        $this->viewMoreModal = true;
        $this->patient = PatientCollection::find($id);
        $this->date =  $this->patient->date;
        $this->phone_number =   $this->patient->phone_number;
        $this->gender =   $this->patient->gender;
        $this->transfer_date=  $this->patient->transfer_date;
        $this->contact =   $this->patient->contact;
    }

    public function openModalUpdate($id){
        $this->updateModal = true;
        $this->patient = PatientCollection::find($id);
        $this->patient_id =   $this->patient->patient_id;
        $this->patient_full_name=   $this->patient->patient_full_name;
        $this->date =  $this->patient->date;
        $this->phone_number =   $this->patient->phone_number;
        $this->gender =   $this->patient->gender;
        $this->required_blood_group =  $this->patient->required_blood_group;
        $this->location =   $this->patient->location;
        $this->contact =   $this->patient->contact;
        $this->transfer_date =   $this->patient->transfer_date;
    }

    public function update($id){
        $this->patient->update([
            'patient_id' => $this->patient_id,
            'patient_full_name'=> $this->patient_full_name,
            'date' => $this->date,
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'required_blood_group' => $this->required_blood_group,
            'location' => $this->location,
            'contact' => $this->contact,
            'transfer_date'=> $this->transfer_date,
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

        $patient = PatientCollection::find($id);
        $patient->delete();
        $this->patient_id = $patient->patient_id;
        $this->patient_full_name = $patient->patient_full_name;
        $this->date = $patient->date;
        $this->phone_number = $patient->phone_number;
        $this->required_blood_group = $patient->required_blood_group;
        $this->location = $patient->location;
        $this->contact = $patient->contact;
        $this->transfer_date = $patient->transfer_date;
        $this->dialog([
            'title'       => 'Data Deleted!',
            'description' => 'Data was successfully deletec',
            'icon'        => 'success'
        ]);
    }

    public function render()
    {
        $Patient = PatientCollection::all();

        return view('livewire.view-patient.view-patient-page', [
            'dataPatient' =>    $Patient,

        ])->extends('layouts.main');

    }
}
