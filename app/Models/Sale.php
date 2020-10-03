<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory, Uuid;

    protected $table = "sales";

    protected $fillable = [
        'seller_id',
        'sale_value', 'commission'
    ];

    const VALIDATION_RULES = [
        'seller_id' => [
            'string', 'required'
        ],
        'sale_value' => [
            'integer', 'required', 'min:1'
        ]
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
