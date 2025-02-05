<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //fields to add to table name,date,user_id,status,project_id
    // ALTER TABLE `tasks` ADD `end_date` DATE NULL DEFAULT NULL AFTER `name`;
    // ALTER TABLE `users` ADD `partner` BOOLEAN NOT NULL DEFAULT FALSE AFTER `remember_token`;
    use HasFactory;
}
