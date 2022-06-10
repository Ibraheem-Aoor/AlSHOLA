<?php

namespace App\Http\Livewire\Admin\Views\Settings;

use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GeneralBessniuessSettings extends Component
{
    // Social Links
    public $fb , $insta , $linkedin , $twitter;

    //SEo Tags
    public $description  , $keywords  , $og_type , $og_descreption  , $og_image , $og_title ;

    public function mount()
    {
        $cacheData  = Cache::get('businessSetting');
        $this->fb = Cache::get('businessSetting')->where('key','facebook')->first()->value;
        $this->insta = Cache::get('businessSetting')->where('key','instagram')->first()->value;
        $this->linkedin = Cache::get('businessSetting')->where('key','linkedin')->first()->value;
        $this->twitter = Cache::get('businessSetting')->where('key','twitter')->first()->value;
    }

    public function saveSocialLinks()
    {
        $facebook = BusinessSetting::where('key' , 'facebook')->first();
        $facebook->value = $this->fb;
        $facebook->save();
        $instagram = BusinessSetting::where('key' , 'instagram')->first();
        $instagram->value = $this->insta;
        $instagram->save();
        $twit = BusinessSetting::where('key' , 'twitter')->first();
        $twit->value = $this->twitter;
        $twit->save();
        $linked = BusinessSetting::where('key' , 'linkedin')->first();
        $linked->value = $this->linkedin;
        $linked->save();
        Cache::forget('businessSetting');
        Cache::rememberForever('businessSetting', function () {
            return DB::table('business_settings')->get();
        });
        notify()->success('Socail Links Updated Successfully');
        return redirect(route('admin.settings.general'));
    }
    public function render()
    {
        return view('livewire.admin.views.settings.general-bessniuess-settings')
        ->extends('layouts.admin.master')->section('content');
    }
}
