<?php

namespace App\Models;

class Experience extends Model
{
    protected $table = 'experiences';
    
    protected $fillable = [
        'company_name',
        'position',
        'start_date',
        'end_date',
        'current',
        'description',
        'location',
        'company_website',
        'company_logo'
    ];

    public function getAllExperiences()
    {
        return $this->orderBy('start_date', 'DESC')->get();
    }

    public function getExperience($id)
    {
        return $this->find($id);
    }

    public function createExperience($data)
    {
        return $this->create($data);
    }

    public function updateExperience($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteExperience($id)
    {
        return $this->delete($id);
    }
} 