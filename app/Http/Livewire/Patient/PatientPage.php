<?php

namespace App\Http\Livewire\Patient;
use App\Models\PatientCollection;
use Livewire\Component;
use WireUi\Traits\Actions;

class PatientPage extends Component
{
    use Actions;
    public $patient_id;
    public $patient_full_name;
    public $date;
    public $phone_number;
    public $gender;
    public $required_blood_group;
    public $location;
    public $contact;
    public $transfer_date;

    public function create() {

        $this->validate([
            'patient_id'  => 'required',
            'patient_full_name' => 'required',
            'phone_number' => 'required',
            'date' => 'required',
            'gender' => 'required',
            'required_blood_group' => 'required',
            'location' => 'required',
            'contact' => 'required',
            'transfer_date' => 'required',

        ]);

        PatientCollection::create([
            'user_id' => auth()->user()->id,
            'patient_id' => $this->patient_id,
            'patient_full_name' => $this->patient_full_name,
            'date' => $this->date,
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'required_blood_group' => $this->required_blood_group,
            'location' => $this->location,
            'contact' => $this->contact,
            'transfer_date' => $this->transfer_date,

        ]);


        $this->dialog()->success(
            $title = 'Successfully',
            $description = 'Patient added succesfully.'
        );

        $this->patient_id = '';
        $this->patient_full_name = '';
        $this->date= '';
        $this->phone_number = '';
        $this->gender = '';
        $this->required_blood_group = '';
        $this->location = '';
        $this->contact = '';
        $this->transfer_date= '';

    }

    public function render()
    {
        return view('livewire.patient.patient-page')->extends('layouts.main');
    }
}
