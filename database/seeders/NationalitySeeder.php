<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            "afghan" , "albanian", "algerian" ,"american" ,"andorran" ,"angolan"
            ,"antiguans" ,"argentinean" , "armenian" , "australian" , "austrian" , "azerbaijani"
            ,"bahamian" ,"bahraini" , "bangladeshi" , "barbadian" , "barbudans" ,"batswana" ,"belarusian"
            ,"belgian","belizean","beninese", "bhutanese", "bolivian","bosnian", 'Saudi' ,  'Russian',
            "brazilian",    "british",  "bruneian",   "bulgarian",   "burkinabe",   "burmese", 'Turkish',
            "burundian","cambodian","cameroonian","canadian", 'Bahraini' , 'Bangladeshi', 'Emirian', 'Qatari' ,
            'Jordanian' , 'Kuwaiti' ];

        foreach($names as $name)
        {
            Nationality::create(['name' => $name]);
        }
    }
}
