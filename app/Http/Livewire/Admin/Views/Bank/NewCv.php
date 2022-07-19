<?php

namespace App\Http\Livewire\Admin\Views\Bank;

use App\Models\Application;
use App\Models\Nationality;
use App\Models\Title;
use Livewire\Component;

class NewCv extends Component
{



    public  function generateApplicationRef() {
        $number = 0;
        if(Application::count() == 0)
        {
            $number = 0;
        }else{
            $applicatinosRefs = Application::pluck('ref')->toArray();
            asort($applicatinosRefs);
            $number = (int)$applicatinosRefs[array_key_last($applicatinosRefs)];
        }
        return $number + 1;
    }

    public function render()
    {
        $ref = $this->generateApplicationRef();
        $titles = Title::all();
        $nationalities = Nationality::all();
        return view('livewire.admin.views.bank.new-cv' , ['ref'=> $ref , 'titles' => $titles , 'nationalities' => $nationalities])->extends('layouts.admin.master')->section('content');
    }
}
