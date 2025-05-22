<?php
namespace App\Models;

use App\Helpers\DBHelper;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    protected $table = 'projects';
    protected $prefix = 'pf_';

    protected $fillable = [
        'title',
        'description',
        'technologies',
        'project_url',
        'github_url',
        'image_url',
        'start_date',
        'end_date',
        'featured',
        'category'
    ];

    public function create($data) {
        return DBHelper::table($this->prefix . $this->table)
            ->insert($data);
    }

    public function getAll() {
        return DBHelper::table($this->prefix . $this->table)->get();
    }

    public function findById($id) {
        return DBHelper::table($this->prefix . $this->table)
            ->where('id = ?', [$id])
            ->first();
    }

    public function updateById($id, $data) {
        return DBHelper::table($this->prefix . $this->table)
            ->where('id = ?', [$id])
            ->update($data);
    }

    public function deleteById($id) {
        return DBHelper::table($this->prefix . $this->table)
            ->where('id = ?', [$id])
            ->delete();
    }

    public function getAllProjects()
    {
        return $this->orderBy('start_date', 'DESC')->get();
    }

    public function getFeaturedProjects()
    {
        return $this->where('featured', true)
                    ->orderBy('start_date', 'DESC')
                    ->get();
    }

    public function getProject($id)
    {
        return $this->find($id);
    }

    public function createProject($data)
    {
        return $this->create($data);
    }

    public function updateProject($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProject($id)
    {
        return $this->delete($id);
    }
} 