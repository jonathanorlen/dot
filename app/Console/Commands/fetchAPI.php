<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class fetchAPI extends Command
{   
    protected $signature = 'fetch:API';

    protected $description = 'Fetching API data province & city to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        $this->info("Fetching data from API to Database");
        
        $start = Carbon::now();

        $get_province = json_decode(Http::withHeaders(['key' => '0df6d5bf733214af6c6644eb8717c92c'])->get('https://api.rajaongkir.com/starter/province'));
        foreach($get_province->rajaongkir->results as $province){
            DB::table('province')->insert((array)$province);
        }
        $time = $start->diffInSeconds(Carbon::now());
        $this->comment("Fetching province data process in $time seconds");

        $get_city = json_decode(Http::withHeaders(['key' => '0df6d5bf733214af6c6644eb8717c92c'])->get('https://api.rajaongkir.com/starter/city'));

        $data_city = [];
        foreach($get_city->rajaongkir->results as $city){
            $data_city[] = [
                'city_id' => $city->city_id,
                'province_id' => $city->province_id,
                'province' => $city->province,
                'type' => $city->type,
                'city_name' => $city->city_name,
                'postal_code' => $city->postal_code,
            ];
        }

        foreach(array_chunk($data_city,10) as $city){
            DB::table('city')->insert($city);
        }

        $time = $start->diffInSeconds(Carbon::now());
        $this->comment("Fetching city data process in $time seconds");
    }
}