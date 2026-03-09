<?php

namespace App\Models;

use CodeIgniter\Model;

class AcademicCalendarModel extends Model
{
    protected $table = 'academic_calendar';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['title', 'description', 'start_date', 'end_date', 'color'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getEvents()
    {
        return $this->findAll();
    }
}
