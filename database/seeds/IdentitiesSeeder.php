<?php

use Illuminate\Database\Seeder;
use App\Identity;

class IdentitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $identities = config('identities.identities', []);

        foreach ($identities as $identity) {
            Identity::create($identity);
        }
    }
}
