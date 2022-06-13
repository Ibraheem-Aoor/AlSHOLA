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
    public $description  , $keywords  , $og_type , $og_descreption  , $og_title ;

    public function mount()
    {
      //social links
        $cacheData  = Cache::get('businessSetting');
        $this->fb = $cacheData->where('key','facebook')->first()->value;
        $this->insta = $cacheData->where('key','instagram')->first()->value;
        $this->linkedin = $cacheData->where('key','linkedin')->first()->value;
        $this->twitter = $cacheData->where('key','twitter')->first()->value;

      //seo
        $this->og_type = $cacheData->where('key' , 'og_type')->first()->value;
        $this->og_descreption = $cacheData->where('key' , 'og_descreption')->first()->value;
        $this->og_image = $cacheData->where('key' , 'og_image')->first()->value;
        $this->og_title = $cacheData->where('key' , 'og_title')->first()->value;
        $this->description = $cacheData->where('key' , 'meta_description')->first()->value;
        $this->keywords = $cacheData->where('key' , 'meta_keywords')->first()->value;

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
        $this->clearCache();
        notify()->success('Socail Links Updated Successfully');
        return redirect(route('admin.settings.general'));
    }



    public function saveSeo()
    {
        $og_title = BusinessSetting::where('key' , 'og_title')->first();
        $og_title->value = $this->og_title;
        $og_title->save();
        $og_type = BusinessSetting::where('key' , 'og_type')->first();
        $og_type->value = $this->og_type;
        $og_type->save();
        $desc = BusinessSetting::where('key' , 'meta_description')->first();
        $desc->value = $this->og_descreption;
        $desc->save();
        $og_desc = BusinessSetting::where('key' , 'og_descreption')->first();
        $og_desc->value = $this->og_descreption;
        $og_desc->save();
        $keywor = BusinessSetting::where('key' , 'meta_keywords')->first();
        $keywor->value = $this->keywords;
        $keywor->save();
        $this->clearCache();
        notify()->success('Seo Tags Updated Successfully');
        return redirect(route('admin.settings.general'));
    }


    public function clearCache()
    {
        Cache::forget('businessSetting');
        Cache::rememberForever('businessSetting', function () {
            return DB::table('business_settings')->get();
        });
    }


    public function render()
    {
        return view('livewire.admin.views.settings.general-bessniuess-settings')
        ->extends('layouts.admin.master')->section('content');
    }
}
