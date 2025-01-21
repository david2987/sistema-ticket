<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'title', 'description', 'due_date', 'status'];
    protected $useTimestamps = true; // Maneja created_at y updated_at automáticamente
}
