<?php
namespace App\Models;

use CodeIgniter\Model;

class EventRegistrationModel extends Model
{
    protected $table = 'event_registrations';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'event_id', 'member_id', 'participant_name', 'participant_email',
        'participant_phone', 'registration_fee_paid', 'payment_status', 'receipt_path'
    ];
    protected $useTimestamps = true;

    public function getEventParticipants($eventId)
    {
        return $this->where('event_id', $eventId)->findAll();
    }

    public function getMemberEventRegistrations($memberId)
    {
        return $this->where('member_id', $memberId)->findAll();
    }
}
