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

    /**
     *  Não usa o created_at e updated_at
     */

    public $timestamps = false;

    public function User() {
        return $this->belongTo(User::class);
    }
}
