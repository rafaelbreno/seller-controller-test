<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Uuid;


    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const VALIDATION_RULES = [
        'name' => [
            'string', 'required'
        ],
        'email' => [
            'email', 'required', 'unique:users'
        ],
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class, 'seller_id');
    }

    public function formatDetailed()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email
        ];
    }

    public function formatAllInfo()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'sales' => $this->sales
                            ->map
                            ->formatAllInfo()
                            ->toArray()
        ];
    }

    static public function whereDetailed(string $id)
    {
        return self::where('id', $id)->get()
            ->map
            ->formatDetailed()
            ->first();
    }
}
