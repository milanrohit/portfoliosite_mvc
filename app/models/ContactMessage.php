<?php

namespace App\Models;

class ContactMessage extends Model
{
    protected $table = 'contact_messages';
    
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read'
    ];

    public function create($data)
    {
        return $this->insert($data);
    }

    public function getUnreadMessages()
    {
        return $this->where('is_read', false)
                    ->orderBy('created_at', 'DESC')
                    ->get();
    }

    public function markAsRead($id)
    {
        return $this->update($id, ['is_read' => true]);
    }

    public function getMessage($id)
    {
        return $this->find($id);
    }

    public function getAllMessages($limit = 10, $offset = 0)
    {
        return $this->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->offset($offset)
                    ->get();
    }

    public function getTotalMessages()
    {
        return $this->count();
    }

    public function getUnreadCount()
    {
        return $this->where('is_read', false)->count();
    }
} 