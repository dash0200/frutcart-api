<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratechart extends Model
{
    use HasFactory;

    protected $table = 'rate_chart';

    protected $fillable = [
        'type',
        'rate',
        'unit',
        'description',
        'user_id'
    ];

    public function  getUser() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
