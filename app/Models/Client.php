<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'client_name',
        'country',
        'user_id',
        'town',
        'phone_number',
        'isCompany',
        'client_email',
        'logo'
    ];

    public function user():BelongsTo{

        return $this->belongsTo(User::class);
    }
}
