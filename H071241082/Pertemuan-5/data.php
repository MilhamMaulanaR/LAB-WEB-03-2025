<?php
$users = [
    [
        'email' => 'admin@example.com',
        'username' => 'adminxxx',
        'name' => 'Administrator',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'user1@example.com',
        'username' => 'user1',
        'name' => 'User Satu',
        'password' => password_hash('user123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Teknik Informatika',
        'batch' => '2023',
    ],
    [
        'email' => 'user2@example.com',
        'username' => 'user2',
        'name' => 'User Dua',
        'password' => password_hash('user123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'Sistem Informasi',
        'batch' => '2023',
    ],
    [
        'email' => 'user3@example.com',
        'username' => 'user3',
        'name' => 'User Tiga',
        'password' => password_hash('user123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Teknik Komputer',
        'batch' => '2022',
    ],
    [
        'email' => 'user4@example.com',
        'username' => 'user4',
        'name' => 'User Empat',
        'password' => password_hash('user123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'Manajemen Informatika',
        'batch' => '2021',
    ],
];
?>