<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['title', 'slug', 'summary', 'content', 'image', 'status', 'teacher_id', 'writer'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Get articles with teacher relation
    public function getArticlesWithAuthor()
    {
        return $this->select('articles.*, teachers.name as teacher_author_name')
            ->join('teachers', 'teachers.id = articles.teacher_id', 'left')
            ->orderBy('articles.created_at', 'DESC')
            ->findAll();
    }
}
