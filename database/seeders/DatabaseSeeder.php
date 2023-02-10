<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        Listing::factory(6)->create();
        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Avitela',
        //     'email' => 'email1@email.com',
        //     'location' => 'Klaipeda, Lithuania',
        //     'website' => 'https://www.avitela.lt',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ullamcorper,
        //     sapien quis faucibus aliquam, sapien ante elementum lectus, a condimentum ipsum mauris nec turpis.
        //      Proin lacinia leo eget neque hendrerit, ut posuere mi rutrum. Proin aliquam, justo sed dapibus vulputate, 
        //      nunc metus venenatis enim, non pretium ligula risus in odio. '
        // ]);

        // Listing::create([
        //     'title' => 'Php Junior Developer',
        //     'tags' => 'php, junior',
        //     'company' => 'CodeAcademy',
        //     'email' => 'email2@email.com',
        //     'location' => 'Vilnius, Lithuania',
        //     'website' => 'https://www.codeacademy.lt',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ullamcorper,
        //     sapien quis faucibus aliquam, sapien ante elementum lectus, a condimentum ipsum mauris nec turpis.
        //      Proin lacinia leo eget neque hendrerit, ut posuere mi rutrum. Proin aliquam, justo sed dapibus vulputate, 
        //      nunc metus venenatis enim, non pretium ligula risus in odio. '
        // ]);
    }
}
