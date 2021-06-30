<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    /**
     * Os atributos preenchíveis.
     */
    protected $fillable = [
        'data',
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
