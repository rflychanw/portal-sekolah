<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranSettingsModel extends Model
{
    protected $table = 'pendaftaran_settings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'is_open',
        'title',
        'description',
        'deadline'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = '';
    protected $updatedField = 'updated_at';
}
