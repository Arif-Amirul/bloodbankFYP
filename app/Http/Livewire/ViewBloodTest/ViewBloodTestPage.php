<?php

namespace App\Http\Livewire\ViewBloodTest;
use Livewire\Component;
use App\Models\BloodInformation;
use App\Models\BloodStock;
use WireUi\Traits\Actions;

class ViewBloodTestPage extends Component
{
    use Actions;
    public $updateTestModal = false;
    public $viewTestMoreModal = false;
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
    public $BloodTest;
    // public $blood_availability;

    public function openModalViewTestMore($id){
        $this->viewTestMoreModal = true;
        $this->BloodTest = BloodInformation::find($id);
        $this->white_blood_cells = $this->BloodTest->white_blood_cells;
        $this->red_blood_cells = $this->BloodTest->red_blood_cells;
        $this->haemoglobin = $this->BloodTest->haemoglobin;
        $this->hematrocrit = $this->BloodTest->hematrocrit;
        $this->platelets = $this->BloodTest->platelets;
        $this->hiv_test =$this->BloodTest->hiv_test;
        $this->sodium = $this->BloodTest->sodium;
        $this->potassium = $this->BloodTest->potassium;
        $this->calcium = $this->BloodTest->calcium;
        $this->blood_status = $this->BloodTest->blood_status;
    }

    public function openModalUpdate($id){
        $this->updateTestModal = true;
        $this->BloodTest = BloodInformation::find($id);
        $this->test_id = $this->BloodTest->test_id;
        $this->date = $this->BloodTest->date;
        $this->white_blood_cells = $this->BloodTest->white_blood_cells;
        $this->red_blood_cells = $this->BloodTest->red_blood_cells;
        $this->haemoglobin = $this->BloodTest->haemoglobin;
        $this->hematrocrit = $this->BloodTest->hematrocrit;
        $this->platelets = $this->BloodTest->platelets;
        $this->hiv_test =$this->BloodTest->hiv_test;
        $this->sodium = $this->BloodTest->sodium;
        $this->potassium = $this->BloodTest->potassium;
        $this->calcium = $this->BloodTest->calcium;
        $this->blood_status = $this->BloodTest->blood_status;
    }

    public function update($id){
        $this->BloodTest->update([
            'test_id'=> $this->test_id,
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
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->updateTestModal = false;

        $this->dialog([
            'title'       => 'Data Updated!',
            'description' => 'Data was successfully updated',
            'icon'        => 'success'
        ]);
    }

    // public function delete($id){

    //     $BloodTest = BloodInformation::find($id);
    //     $BloodTest->delete();
    //     $this->test_id = $BloodTest->test_id;
    //     $this->blood_id = $BloodTest->blood_id;
    //     $this->blood_group = $BloodTest->blood_group;
    //     $this->date = $BloodTest->date;
    //     // $this->blood_availability = $BloodTest->blood_availability;
    //     $this->white_blood_cells = $BloodTest->white_blood_cells;
    //     $this->red_blood_cells = $BloodTest->red_blood_cells;
    //     $this->haemoglobin = $BloodTest->haemoglobin;
    //     $this->hematrocrit = $BloodTest->hematrocrit;
    //     $this->platelets = $BloodTest->platelets;
    //     $this->hiv_test = $BloodTest->hiv_test;
    //     $this->sodium = $BloodTest->sodium;
    //     $this->potassium = $BloodTest->potassium;
    //     $this->calcium = $BloodTest->calcium;
    //     $this->blood_status = $BloodTest->blood_status;

    //     $this->dialog([
    //         'title'       => 'Data Deleted!',
    //         'description' => 'Data was successfully deleted',
    //         'icon'        => 'success'
    //     ]);

    //     $bloodStock = BloodStock::where('blood_type' ,$this->blood_group )->first();

    //     $updateBloodStock = BloodStock::where('blood_type' ,$this->blood_group )
    //             ->update(['quantity' => $bloodStock->quantity - 1]);

    // }

    public function delete($id){

        $BloodTest = BloodInformation::find($id);
        $bloodGroup = $BloodTest->blood_group;

        if($BloodTest){
            $BloodTest->delete();

            $this->test_id = $BloodTest->test_id;
            $this->blood_id = $BloodTest->blood_id;
            // Assign other properties as needed...

            $this->dialog([
                'title'       => 'Data Deleted!',
                'description' => 'Data was successfully deleted',
                'icon'        => 'success'
            ]);

            $bloodStock = BloodStock::where('blood_type', $bloodGroup)->first();

            if ($bloodStock && $bloodStock->quantity > 0) {
                $newQuantity = max(0, $bloodStock->quantity - 1);

                $updateBloodStock = BloodStock::where('blood_type', $bloodGroup)
                    ->update(['quantity' => $newQuantity]);
            } else {
                // Handle the case where the blood stock doesn't exist or is already at 0
                // You might want to add error handling or other logic here
            }
        } else {
            // Handle the case where BloodTest with the given ID doesn't exist
            // You might want to add error handling or other logic here
        }
    }


    public function render()
    {
        $BloodTest = BloodInformation::all();

        return view('livewire.view-blood-test.view-blood-test-page', [
            'blooddata' =>  $BloodTest,
        ])->extends('layouts.main');
    }
}
