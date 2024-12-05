<?php

namespace App\Http\Livewire\BloodTestPage;
use App\Models\BloodInformation;
use App\Models\BloodStock;
use App\Models\Donate;
use Livewire\Component;
use WireUi\Traits\Actions;

class BloodTestPage extends Component
{
    //ADD BLOOD TEST
    use Actions;
    public $test_id;
    public $blood_id;
    public $blood_group;
    public $date;
    public $white_blood_cells;
    public $red_blood_cells;
    public $haemoglobin;
    public $hematrocrit;
    public $platelets;
    public $hiv_test;
    public $sodium;
    public $potassium;
    public $calcium;
    public $blood_status;


    public function updatedBloodId($value)
    {
        $this->blood_group = Donate::join('donor_information', 'donate.donor_id', '=', 'donor_information.donor_id')
            ->where('donate.blood_id', $value)
            ->value('donor_information.blood_group');
    }

    public function create() {

        $this->validate([
            'test_id' => 'required',
            'blood_id' => 'required',
            'blood_group' => 'required',
            'date' => 'required',
            'white_blood_cells' => 'required',
            'red_blood_cells'=> 'required',
            'haemoglobin' => 'required',
            'hematrocrit' => 'required',
            'platelets' => 'required',
            'hiv_test' => 'required',
            'sodium'=> 'required',
            'potassium'=> 'required',
            'calcium'=> 'required',
            'blood_status' => 'required',
        ]);

        BloodInformation::create([
            'user_id' => auth()->user()->id,
            'test_id'=> $this->test_id,
            'blood_id'=> $this->blood_id,
            'blood_group'=> $this->blood_group,
            'date'=> $this->date,
            'white_blood_cells'=> $this->white_blood_cells,
            'red_blood_cells'=> $this->red_blood_cells,
            'haemoglobin'=> $this->haemoglobin,
            'hematrocrit'=> $this->hematrocrit,
            'platelets'=> $this->platelets,
            'hiv_test'=> $this->hiv_test,
            'sodium'=> $this->sodium,
            'potassium'=> $this->potassium,
            'calcium'=> $this->calcium,
            'blood_status'=> $this->blood_status,
        ]);


        $bloodStock = BloodStock::where('blood_type' ,$this->blood_group )->first();

        $updateBloodStock = BloodStock::where('blood_type' ,$this->blood_group )
                ->update(['quantity' => $bloodStock->quantity + 1]);

        $this->reset([
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
        ]);

        $this->dialog()->success(
            $title = 'Successfully',
            $description = 'Blood collection added succesfully.'
        );

    }
    public function render()
{
    // Fetch blood_id and fullname from tables using join
    $bloodData = Donate::join('donor_information', 'donate.donor_id', '=', 'donor_information.donor_id')
        ->select('donate.blood_id', 'donor_information.full_name')
        ->distinct()
        ->pluck('donor_information.full_name', 'donate.blood_id'); // Fetch unique blood IDs with full names

    return view('livewire.blood-test-page.blood-test-page', [
        'bloodData' => $bloodData,
    ])->extends('layouts.main');
}

}
