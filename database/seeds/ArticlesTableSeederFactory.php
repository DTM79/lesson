<?php
use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeederFactory extends Seeder
{
    /**
     * Run the database seeds.composer dump-autoload
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class,150)->create();
    }
}
