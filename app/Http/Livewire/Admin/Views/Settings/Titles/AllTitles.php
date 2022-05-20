<?php

namespace App\Http\Livewire\Admin\Views\Settings\Titles;

use App\Models\Sector;
use App\Models\Title;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AllTitles extends Component
{

    /**
     * Show All Titles
     * Edit Title
     * Delete Title
     */
    public $newTitleName , $selectedCategory , $targetTileId , $currentRoute;

    public function mount($id = null)
    {
        $this->currentRoute = Route::currentRouteName();
    }

    public function setTitleId($id)
    {
        $title =  Title::with('sector:id,name')->findOrFail($id);
        $this->targetTileId = $title->id;
        $this->selectedCategory = $title->sector->id;
    }

    public function editTitle()
    {
        $this->validate(['newTitleName' => 'required|string|max:255' , 'selectedCategory' =>  'required']);
        $title = Title::findOrFail($this->targetTileId);
        $title->name = $this->newTitleName;
        $title->sector_id = $this->selectedCategory;
        $title->save();
        notify()->success('Title Updated Successfully');
        return redirect(route($this->currentRoute));
    }


    public function deleteTitle($id)
    {
        Title::findOrFail($id)->delete();
        notify()->success('Title Deleted Successfully');
        return redirect(route($this->currentRoute));
    }

    public function render()
    {
        $titles = DB::table('titles')->simplePaginate(15);
        return view('livewire.admin.views.settings.titles.all-titles'
    ,
    [
        'titles' => $titles,
        'categoires' => Sector::all(),
    ]
    )->extends('layouts.admin.master')->section('content');

    }
}
