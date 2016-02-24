<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$faker = Faker::create('pl_PL');

		foreach (range(1, 5) as $index) {
			DB::table('pages')->insert([
				'name' => $faker->name,
				'short_description' => $faker->realText(rand(20, 20)),
				'description' => $faker->realText(rand(20, 20)),
				'seo' => Illuminate\Support\Str::slug($faker->name),
				'public_date' => date($format = 'Y-m-d'),
				'create_date' => date($format = 'Y-m-d'),
			]);
		}
	}
}