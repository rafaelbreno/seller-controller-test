<?php

namespace App\Models;

use App\Traits\Uuid;
use Carbon\Carbon;
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
            'integer', 'required', 'min:1', 'max:420000'
        ]
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->sale_value = $model->sale_value * 10000;
            $model->commission = intval($model->sale_value * 0.085);
        });
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function formatAllInfo()
    {
        return [
            'id' => $this->id,
            'sale_value' => number_format($this->sale_value / 10000, 2),
            'commission' => number_format($this->commission / 10000, 2),
            'created_at' => Carbon::createFromDate($this->create_at)->format("H:s d/m/Y")
        ];
    }
}
