<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FacultyCourse extends Component
{
    public $selectedFaculty;
    public $courses = [];

    public function mount()
    {
        $this->selectedFaculty = '';
        $this->courses = [];
    }

    public function handleSelectedFacultyChange()
    {
        // switch ($this->selectedFaculty) {
        //     case 'FAS, FBF':
        //         $this->courses = [];
        //         break;
        //     case 'FEGT, FICT. FSc. ICS':
        //         $this->courses = [];
        //         break;
        //     case 'FAM, FCI':
        //         $this->courses = [];
        //         break;
        //     case 'LKC FES':
        //         $this->courses = [];
        //         break;
        //     case 'MK FMHS':
        //         $this->courses = [];
        //         break;
        //     default:
        //         $this->courses = [];
        //         break;
        // }

        switch ($this->selectedFaculty) {
            case 'FAS':
                $this->courses = ['BA (Honours) English Education', 'BA (Honours) English Language', 'B.Comm. (Honours) Advertising'];
                break;
            case 'FEGT':
                $this->courses = ['Bachelor of Science (HONOURS) Construction Management', 'Bachelor of Engineering (HONOURS) Electronic Engineering', 'Bachelor of Technology (HONOURS) in Electronic Systems'];
                break;
            case 'FAM':
                $this->courses = ['Bachelor of Accounting (Honours)', 'Bachelor of Buidling and Property Management (Honours)', 'Bachelor of Economics (Honours) Global Economics'];
                break;
            case 'LKC FES':
                $this->courses = ['Bachelor of Biomedical Engineering with Honours', 'Bachelor of Chemical Engineering with Honours', 'Bachelor of Science (Honours) Software Engineering'];
                break;
            case 'MK FMHS':
                $this->courses = ['Bachelor of Medicine and Bachelor of Surgery', 'Bachelor of Chinese Medicine (Honours)', 'Bachelor of Physiotherapy (Honours)', 'Bachelor of  Nursing (Honours)'];
                break;
            default:
                $this->courses = [];
                break;
        }
    }

    public function render()
    {
        return view('livewire.faculty-course');
    }
}
