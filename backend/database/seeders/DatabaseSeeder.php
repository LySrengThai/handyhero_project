<?php

namespace Database\Seeders;

use App\Models\admin_table;
use App\Models\book_table;
use App\Models\cate_table;
use App\Models\company_table;
use App\Models\receipt_table;
use App\Models\service_table;
use App\Models\user_table;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        admin_table::factory()->create();
        DB::table('service_cate')->insert([
            ['category' => 'Handyman'],
            ['category' => 'Plumbing'],
            ['category' => 'Cleaning'],
            ['category' => 'Electrician'],
            ['category' => 'Roof Repair'],
            ['category' => 'Cracked Concrete'],
            ['category' => 'Land Scaping'],
            ['category' => 'Pain and Drywall Repairs'],
            ['category' => 'Pest Control'],
        ]);
        // user_table::factory(100)->create();
        // company_table::factory(100)->create();
        // service_table::factory(100)->create();
        // book_table::factory(100)->create();
    }
}
