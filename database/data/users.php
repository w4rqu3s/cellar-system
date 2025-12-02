<?php

return [
            [
                "name" => "Victor Marques",
                "email" => "w4rqu3s@gmail.com",
                "password" => Hash::make('S3cr3t'),
                "role_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Hanae Rosa",
                "email" => "hanae.rosa09@gmail.com",
                "password" => Hash::make('@1234@5678'),
                "role_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Lorem Ipslum",
                "email" => "loremipslum@gmail.com",
                "password" => Hash::make('@1234@5678'),
                "role_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Admnin",
                "email" => "admin@gmail.com",
                "password" => Hash::make('@1234@5678'),
                "role_id" => 2,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];