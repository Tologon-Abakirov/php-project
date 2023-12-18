<?php

// app/Models/Bill.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'provider_id', // Поле для связи с провайдером
        'additional_info',
        'user_id',
    ];

    // Определение отношения с провайдером
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

      public function user()
    {
        return $this->belongsTo(User::class);
    }
}