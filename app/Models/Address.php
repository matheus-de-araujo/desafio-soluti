<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'state',
        'city',
        'district',
        'street',
        'complement',
        'cep',
        'user_id',
    ];

    public function User() {
        return $this->belongTo(User::class);
    }
}
