<?php

namespace App\Models;

use App\Models\Concerns\HasPublicUuid;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

#[Guarded([])]
class Tenant extends Model
{
    use HasPublicUuid;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
