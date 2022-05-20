<?php

namespace App\Http\Livewire\Admin\Views\Settings\Sectors;

use App\Models\Sector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AllSectors extends Component
{
    /**
     * Show All Sectors
     * Edit Sector
     * Delete Sector
     */

    public $newSectorName ,  $targetSectorId , $currentRoute;

    public function mount($id = null)
    {
        $this->currentRoute = Route::currentRouteName();
    }

    public function setTargetSectorId($id)
    {
        $this->targetSectorId = $id;
    }

    public function editSector()
    {
        $this->validate(['newSectorName'=> 'required|string|max:255']);
        $sector = Sector::findOrFail($this->targetSectorId);
        $sector->name = $this->newSectorName;
        $sector->save();
        notify()->success('Cateogry Updated successfully');
        return redirect(route($this->currentRoute));
    }

    public function deleteSector($id)
    {
        Sector::findOrFail($id)->delete();
        notify()->success('Cateogry Deleted successfully');
        return redirect(route($this->currentRoute));
    }


    public function render()
    {
        $categories = DB::table('sectors')->simplePaginate(15);
        return view('livewire.admin.views.settings.sectors.all-sectors'
    ,
        [
            'categories' => $categories ,
        ])
        ->extends('layouts.admin.master')->section('content');
    }
}
