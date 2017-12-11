23 lines (20 sloc)  535 Bytes
<?php
use Illuminate\Database\Seeder;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Category::all();
        factory(\App\Product::class, 50)
            ->create()
            ->each(function (\App\Product $model) use ($categories) {
                $categoriesCol = $categories->random(5);
                $model->categories()->attach($categoriesCol->pluck('id')->toArray());
            });
    }
}
