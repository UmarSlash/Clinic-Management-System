<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_id', 'staff_id', 'status', 'quantity', 'order_date', 'arrive_date'
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
