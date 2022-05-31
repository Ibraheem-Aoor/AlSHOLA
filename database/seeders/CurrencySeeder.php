<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

$currencies = [
    'AFN' => 'Afghan Afghani',
    'ALL' => 'Albanian Lek',
    'DZD' => 'Algerian Dinar',
    'AOA' => 'Angolan Kwanza',
    'ARS' => 'Argentine Peso',
    'AMD' => 'Armenian Dram',
    'AWG' => 'Aruban Florin',
    'AUD' => 'Australian Dollar',
    'AZN' => 'Azerbaijani Manat',
    'BSD' => 'Bahamian Dollar',
    'BDT' => 'Bangladeshi Taka',
    'BBD' => 'Barbadian Dollar',
    'BZD' => 'Belize Dollar',
    'BMD' => 'Bermudian Dollar',
    'BOB' => 'Bolivian Boliviano',
    'BAM' => 'Bosnia & Herzegovina Convertible Mark',
    'BWP' => 'Botswana Pula',
    'BRL' => 'Brazilian Real',
    'GBP' => 'British Pound',
    'BND' => 'Brunei Dollar',
    'BGN' => 'Bulgarian Lev',
    'BIF' => 'Burundian Franc',
    'KHR' => 'Cambodian Riel',
    'CAD' => 'Canadian Dollar',
    'CVE' => 'Cape Verdean Escudo',
    'KYD' => 'Cayman Islands Dollar',
    'XAF' => 'Central African Cfa Franc',
    'XPF' => 'Cfp Franc',
    'CLP' => 'Chilean Peso',
    'CNY' => 'Chinese Renminbi Yuan',
    'COP' => 'Colombian Peso',
    'KMF' => 'Comorian Franc',
    'CDF' => 'Congolese Franc',
    'CRC' => 'Costa Rican Colón',
    'HRK' => 'Croatian Kuna',
    'CZK' => 'Czech Koruna',
    'DKK' => 'Danish Krone',
    'DJF' => 'Djiboutian Franc',
    'DOP' => 'Dominican Peso',
    'XCD' => 'East Caribbean Dollar',
    'EGP' => 'Egyptian Pound',
    'ETB' => 'Ethiopian Birr',
    'EUR' => 'Euro',
    'FKP' => 'Falkland Islands Pound',
    'FJD' => 'Fijian Dollar',
    'GMD' => 'Gambian Dalasi',
    'GEL' => 'Georgian Lari',
    'GIP' => 'Gibraltar Pound',
    'GTQ' => 'Guatemalan Quetzal',
    'GNF' => 'Guinean Franc',
    'GYD' => 'Guyanese Dollar',
    'HTG' => 'Haitian Gourde',
    'HNL' => 'Honduran Lempira',
    'HKD' => 'Hong Kong Dollar',
    'HUF' => 'Hungarian Forint',
    'ISK' => 'Icelandic Króna',
    'INR' => 'Indian Rupee',
    'CHF' => 'Swiss Franc',
    'TJS' => 'Tajikistani Somoni',
    'TZS' => 'Tanzanian Shilling',
    'THB' => 'Thai Baht',
    'TOP' => 'Tongan Paʻanga',
    'TTD' => 'Trinidad and Tobago Dollar',
    'TRY' => 'Turkish Lira',
    'UGX' => 'Ugandan Shilling',
    'UAH' => 'Ukrainian Hryvnia',
    'AED' => 'United Arab Emirates Dirham',
    'USD' => 'United States Dollar',
    'BHD' => "Bahraini Dinar",
];




    foreach($currencies as $key => $value)
        {
            Currency::create(['key' => $key , 'value' => $value]);
        }
    }
}
