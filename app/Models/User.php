<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    private const TYPE_FESTIVAL = 'festival';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];

    protected $appends = [
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isFestival(): bool
    {
        return $this->type === self::TYPE_FESTIVAL;
    }

    public function checkouts()
    {
        return $this->hasMany('App\Models\Checkout');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function transactions()
    {
        return Transaction::with(['from', 'to'])
            ->where('from_id', '=', $this->id)
            ->orWhere('to_id', '=', $this->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    protected function balance(): Attribute
    {
        return new Attribute(
            get: fn() => $this->transactionsIn()->sum('amount') - $this->transactionsOut()->sum('amount'),
        );
    }

    public function transactionsIn()
    {
        return $this->hasMany(Transaction::class, 'to_id');
    }

    public function transactionsOut()
    {
        return $this->hasMany(Transaction::class, 'from_id');
    }
}
