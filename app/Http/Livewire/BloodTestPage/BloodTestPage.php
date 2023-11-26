<?php

namespace App\Http\Livewire\BloodTestPage;
use App\Models\BloodInformation;
use App\Models\Donate;
use Livewire\Component;
use WireUi\Traits\Actions;

class BloodTestPage extends Component
{
    //ADD BLOOD TEST
    use Actions;
    public $test_id;
    public $blood_id;
    public $date;
    public $white_blood_cells;
    public $neutrophils;
    public $red_blood_cells;
    public $haemoglobin;
    public $hematrocrit;
    public $mcv;
    public $platelets;
    public $cd4_cd8;
    public $hiv_test;
    public $glicaemia;
    public $transferrin;
    public $ferritim;
    public $sodium;
    public $potassium;
    public $calcium;
    public $plasma_proteins;
    public $albumin;
    public $prealbumin;
    public $gamma_globulins;
    public $alt;
    public $gamma_gt;
    public $blood_status;

    public function create() {

        $this->validate([
            'test_id' => 'required',
            'blood_id' => 'required',
            'date' => 'required',
            'white_blood_cells' => 'required',
            'neutrophils' => 'required',
            'red_blood_cells'=> 'required',
            'haemoglobin' => 'required',
            'hematrocrit' => 'required',
            'mcv' => 'required',
            'platelets' => 'required',
            'cd4_cd8' => 'required',
            'hiv_test' => 'required',
            'glicaemia' => 'required',
            'transferrin' => 'required',
            'ferritim' => 'required',
            'sodium'=> 'required',
            'potassium'=> 'required',
            'calcium'=> 'required',
            'plasma_proteins' => 'required',
            'albumin' => 'required',
            'prealbumin' => 'required',
            'gamma_globulins' => 'required',
            'alt' => 'required',
            'gamma_gt' => 'required',
            'blood_status' => 'required',
        ]);

        BloodInformation::create([
            'user_id' => auth()->user()->id,
            'test_id'=> $this->test_id,
            'blood_id'=> $this->blood_id,
            'date'=> $this->date,
            'white_blood_cells'=> $this->white_blood_cells,
            'neutrophils'=> $this->neutrophils,
            'red_blood_cells'=> $this->red_blood_cells,
            'haemoglobin'=> $this->haemoglobin,
            'hematrocrit'=> $this->hematrocrit,
            'mcv'=> $this->mcv,
            'platelets'=> $this->platelets,
            'cd4_cd8'=> $this->cd4_cd8,
            'hiv_test'=> $this->hiv_test,
            'glicaemia'=> $this->glicaemia,
            'transferrin'=> $this->transferrin,
            'ferritim'=> $this->ferritim,
            'sodium'=> $this->sodium,
            'potassium'=> $this->potassium,
            'calcium'=> $this->calcium,
            'plasma_proteins'=> $this->plasma_proteins,
            'albumin'=> $this->albumin,
            'prealbumin'=> $this->prealbumin,
            'gamma_globulins'=> $this->gamma_globulins,
            'alt'=> $this->alt,
            'gamma_gt'=> $this->gamma_gt,
            'blood_status'=> $this->blood_status,
        ]);

        $this->reset([
            'test_id',
            'blood_id',
            'date',
            'white_blood_cells',
            'neutrophils',
            'red_blood_cells',
            'haemoglobin',
            'hematrocrit',
            'mcv',
            'platelets',
            'cd4_cd8',
            'hiv_test',
            'glicaemia',
            'transferrin',
            'ferritim',
            'sodium',
            'potassium',
            'calcium',
            'plasma_proteins',
            'albumin',
            'prealbumin',
            'gamma_globulins',
            'alt',
            'gamma_gt',
            'gamma_gt',
        ]);

        $this->dialog()->success(
            $title = 'Successfully',
            $description = 'Blood collection added succesfully.'
        );

    }
    public function render()
    {
        $bloodIds = Donate::pluck('blood_id', 'blood_id')->unique(); // Fetch unique blood IDs
        return view('livewire.blood-test-page.blood-test-page', [
            'bloodIds' => $bloodIds,
        ])->extends('layouts.main');
    }
}
