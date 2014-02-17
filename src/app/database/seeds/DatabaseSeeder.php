<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('ProjectTableSeeder');
		$this->command->info('Project table seeded!');

		$this->call('TaskTableSeeder');
		$this->command->info('Task table seeded!');

		$this->call('MilestoneTableSeeder');
		$this->command->info('Milestone table seeded!');
	}
}