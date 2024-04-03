<?php

namespace Database\Seeders;

use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$user = User::create([
			'name' => 'Test Admin',
			'email' => 'test@test.com',
			'password' => Hash::make('12345678'),
			'email_verified_at'			=> Carbon::now(),
		]);

		$user->assignRole('Administrator');

		$user = User::create([
			'name' => 'Test Agent',
			'email' => 'test1@test.com',
			'password' => Hash::make('12345678'),
			'email_verified_at'			=> Carbon::now(),
		]);

		$user->assignRole('Agent');

		$user = User::create([
			'name' => 'Test User',
			'email' => 'test2@test.com',
			'password' => Hash::make('12345678'),
			'email_verified_at'			=> Carbon::now(),
		]);

		$user->assignRole('User');
	}
}
