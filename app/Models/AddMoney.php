<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddMoney extends Model
{
    use HasFactory;

    protected $table = 'add_money';

    protected $fillable = [
        'name',
        'value',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
