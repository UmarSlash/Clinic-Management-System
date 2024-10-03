<?php

namespace App\Traits;

trait TimeSlotTrait
{
    public $timeSlots = [];

    public function getTimeSlots()
    {
        // Logic to fetch time slots from database or predefined array
        $this->timeSlots = [
            '09:00'=> false,
            '10:00'=> false,
            '11:00'=> false,
            '12:00'=> false,
            '14:00'=> false,
            '15:00'=> false,
            '16:00'=> false,
            '17:00'=> false,
        ];

        return $this->timeSlots;
    }

    // Additional methods can be added based on your requirements
}
