<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user->name = 'Wear Rental Shop';
        $this->user->email = 'wearrental@wearapp.com';
        $this->user->password = Hash::make('wear1234');
        $this->user->role_id = 1;
        $this->user->created_at = now();
        $this->user->updated_at = now();
        $this->user->save();
    }
}
