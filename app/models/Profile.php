<?php

namespace App\Models;

class Profile extends Model
{
    protected $table = 'profiles';
    
    protected $fillable = [
        'name',
        'title',
        'bio',
        'email',
        'phone',
        'location',
        'linkedin_url',
        'github_url',
        'profile_image',
        'resume_url'
    ];

    public function getProfile()
    {
        return $this->find(1); // Assuming single profile
    }

    public function updateProfile($data)
    {
        return $this->update(1, $data);
    }
} 