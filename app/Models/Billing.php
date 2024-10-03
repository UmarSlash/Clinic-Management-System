<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'amount', 'status'
    ];

    public static function getLowestAvailableId()
{
    $usedIds = Billing::pluck('id')->toArray();
    $maxId = !empty($usedIds) ? max($usedIds) : 0;

    for ($i = 1; $i <= $maxId + 1; $i++) {
        if (!in_array($i, $usedIds)) {
            return $i;
        }
    }
    return 1; // Default to 1 if no IDs exist
}

    public function medicalRecords()
    {
        return $this->hasOne(MedicalRecord::class, 'billing_id');
    }
}

