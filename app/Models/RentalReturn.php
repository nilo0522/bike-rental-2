<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalReturn extends Model
{
    use HasFactory;
    protected $primaryKey = 'returned_id';
    protected $table = "returned";

    protected $fillable = [
        'returned_id',
        'user_id',
        'payment_id',
        'returned_status',
        'issue',
        'meetup',
    ];
}
