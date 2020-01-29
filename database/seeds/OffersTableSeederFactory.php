<?php
use App\Models\Offer;
use Illuminate\Database\Seeder;

class OffersTableSeederFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Offer::class,150)->create();
    }
}
