<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Os atributos preenchíveis.
     */
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'birthday',
        'password',
    ];

    /**
     * Os atributos que ficam escondido.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos em tipos nativos.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Telephones() {
        return $this->hasMany(Telephone::class);
    }

    public function Address() {
        return $this->hasOne(Address::class);
    }

    public function Certificate() {
        return $this->hasOne(Certificate::class);
    }
}
