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
    public $newTitleName  , $targetTileId , $currentRoute;

    public function mount($id = null)
    {
        $this->currentRoute = Route::currentRouteName();
    }

    public function setTitleId($id)
    {
        $title =  Title::findOrFail($id);
        $this->targetTileId = $title->id;

    }

    public function editTitle()
    {
        $this->validate(['newTitleName' => 'required|string|max:255' ]);
        $title = Title::findOrFail($this->targetTileId);
        $title->name = $this->newTitleName;
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
    ]
    )->extends('layouts.admin.master')->section('content');

    }
}
