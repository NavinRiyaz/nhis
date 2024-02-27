<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new UserModel();
        try {
            $user->insertBatch([
                [
                    'username' => 'administrator',
                    'email' => 'admin@admin.com',
                    'password' => password_hash("12345678", PASSWORD_BCRYPT),
                    'device_id' => '',
                    'role' => 'SUPER',
                    'status' => 1001,
                    'created_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'updated_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'deleted_at' => new RawSql('CURRENT_TIMESTAMP'),
                ],
                [
                    'username' => 'district',
                    'email' => 'admin@district.com',
                    'password' => password_hash("12345678", PASSWORD_BCRYPT),
                    'device_id' => '',
                    'role' => 'DISTRICT',
                    'status' => 1002,
                    'created_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'updated_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'deleted_at' => new RawSql('CURRENT_TIMESTAMP'),
                ],
                [
                    'username' => 'state',
                    'email' => 'admin@state.com',
                    'password' => password_hash("12345678", PASSWORD_BCRYPT),
                    'device_id' => '',
                    'role' => 'STATE',
                    'status' => 1003,
                    'created_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'updated_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'deleted_at' => new RawSql('CURRENT_TIMESTAMP'),
                ],
                [
                    'username' => 'high_level',
                    'email' => 'admin@high_level.com',
                    'password' => password_hash("12345678", PASSWORD_BCRYPT),
                    'device_id' => '',
                    'role' => 'HIGH',
                    'status' => 1003,
                    'created_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'updated_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'deleted_at' => new RawSql('CURRENT_TIMESTAMP'),
                ],
                [
                    'username' => 'uiic',
                    'email' => 'admin@uiic.com',
                    'password' => password_hash("12345678", PASSWORD_BCRYPT),
                    'device_id' => '',
                    'role' => 'UIIC',
                    'status' => 1003,
                    'created_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'updated_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'deleted_at' => new RawSql('CURRENT_TIMESTAMP'),
                ],
                [
                    'username' => 'user_admin',
                    'email' => 'admin@user.com',
                    'password' => password_hash("12345678", PASSWORD_BCRYPT),
                    'device_id' => '',
                    'role' => 'ADMIN',
                    'status' => 1003,
                    'created_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'updated_at' => new RawSql('CURRENT_TIMESTAMP'),
                    'deleted_at' => new RawSql('CURRENT_TIMESTAMP'),
                ],
            ]);
        } catch (\ReflectionException $e) {

        }
    }
}
