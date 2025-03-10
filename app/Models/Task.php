<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    //http://localhost/live_project/portfolio/
    //fields to add to table name,date,user_id,status,project_id
    // ALTER TABLE `tasks` ADD `end_date` DATE NULL DEFAULT NULL AFTER `name`;
    // ALTER TABLE `users` ADD `partner` BOOLEAN NOT NULL DEFAULT FALSE AFTER `remember_token`;
    // ALTER TABLE `tasks` CHANGE `duration` `duration` DECIMAL(6,2) NULL DEFAULT NULL, CHANGE `status` `status` BOOLEAN NOT NULL DEFAULT FALSE;
    // ALTER TABLE `tasks` ADD `details` LONGTEXT NULL DEFAULT NULL AFTER `name`;
    // ALTER TABLE `tags` CHANGE `slug` `slug` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

    // ALTER TABLE `products` ADD `user_id` INT NOT NULL DEFAULT '0' AFTER `name`;
    // ALTER TABLE `products` ADD `category` VARCHAR(255) NULL DEFAULT NULL AFTER `subject`;

    // ALTER TABLE `tasks` CHANGE `points` `points` DOUBLE(6,2) NULL DEFAULT '0';
    // ALTER TABLE `users` ADD `rank` VARCHAR(255) NULL DEFAULT NULL AFTER `points`;

    /* 

    ALTER TABLE `contents` CHANGE `details` `details` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
    
    CREATE TABLE `topics` ( `id` int(11) NOT NULL AUTO_INCREMENT, `subject_id` int(11) NOT NULL, `name` varchar(255) NOT NULL, `description` text DEFAULT NULL, `created_at` timestamp NOT NULL DEFAULT current_timestamp(), `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(), PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
      CREATE TABLE `subjects` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `description` text DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;    


      CREATE TABLE `contents` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `title` varchar(255) NOT NULL,
      `topic_id` int(11) NOT NULL DEFAULT 0,
      `details` text NOT NULL,
      `img` varchar(255) DEFAULT NULL,
      `user_id` int(11) NOT NULL,
      `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
      `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
      PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
          
    
    */
    use HasFactory;
}

/* 
    
*/
