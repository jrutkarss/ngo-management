<?php
namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'title', 'description', 'event_date', 'location', 'registration_fee',
        'max_participants', 'image_path', 'status'
    ];
    protected $useTimestamps = true;

    public function getUpcoming()
    {
        return $this->where('status', 'upcoming')
            ->orderBy('event_date', 'ASC')
            ->findAll();
    }

    public function getEventWithRegistrations($eventId)
    {
        $db = \Config\Database::connect();
        return $db->table('events e')
            ->select('e.*, COUNT(er.id) as registration_count')
            ->join('event_registrations er', 'er.event_id = e.id', 'left')
            ->where('e.id', $eventId)
            ->groupBy('e.id')
            ->get()
            ->getRowArray();
    }
}
