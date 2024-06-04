<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $countries = [
            // Countries starting with 'A'
            ['name' => 'Afghanistan', 'code' => '+93'],
            ['name' => 'Albania', 'code' => '+355'],
            ['name' => 'Algeria', 'code' => '+213'],
            ['name' => 'Andorra', 'code' => '+376'],
            ['name' => 'Angola', 'code' => '+244'],
            ['name' => 'Argentina', 'code' => '+54'],
            ['name' => 'Australia', 'code' => '+61'],
            ['name' => 'Austria', 'code' => '+43'],
            ['name' => 'Azerbaijan', 'code' => '+994'],

            // Countries starting with 'B'
            ['name' => 'Bahamas', 'code' => '+1-242'],
            ['name' => 'Bahrain', 'code' => '+973'],
            ['name' => 'Bangladesh', 'code' => '+880'],
            ['name' => 'Barbados', 'code' => '+1-246'],
            ['name' => 'Belarus', 'code' => '+375'],
            ['name' => 'Belgium', 'code' => '+32'],
            ['name' => 'Belize', 'code' => '+501'],
            ['name' => 'Benin', 'code' => '+229'],
            ['name' => 'Bhutan', 'code' => '+975'],
            ['name' => 'Bolivia', 'code' => '+591'],
            ['name' => 'Bosnia and Herzegovina', 'code' => '+387'],
            ['name' => 'Botswana', 'code' => '+267'],
            ['name' => 'Brazil', 'code' => '+55'],
            ['name' => 'Bulgaria', 'code' => '+359'],
            ['name' => 'Burkina Faso', 'code' => '+226'],
            ['name' => 'Burundi', 'code' => '+257'],

            // Countries starting with 'C'
            ['name' => 'Cambodia', 'code' => '+855'],
            ['name' => 'Cameroon', 'code' => '+237'],
            ['name' => 'Canada', 'code' => '+1'],
            ['name' => 'Cape Verde', 'code' => '+238'],
            ['name' => 'Central African Republic', 'code' => '+236'],
            ['name' => 'Chad', 'code' => '+235'],
            ['name' => 'Chile', 'code' => '+56'],
            ['name' => 'China', 'code' => '+86'],
            ['name' => 'Colombia', 'code' => '+57'],
            ['name' => 'Comoros', 'code' => '+269'],
            ['name' => 'Congo', 'code' => '+242'],
            ['name' => 'Costa Rica', 'code' => '+506'],
            ['name' => 'Croatia', 'code' => '+385'],
            ['name' => 'Cuba', 'code' => '+53'],
            ['name' => 'Cyprus', 'code' => '+357'],
            ['name' => 'Czech Republic', 'code' => '+420'],
            ['name' => 'United States America', 'code' => '+1'],

        ];



        DB::table('countries')->insert($countries);
    }
}