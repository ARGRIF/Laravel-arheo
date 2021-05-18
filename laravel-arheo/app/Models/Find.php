<?php

namespace App\Models;

use App\Traits\Postgres\Model\Traits\PostgresArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Find extends Model
{
    use HasFactory, PostgresArray;

    public function setUsersAttribute($value): void
    {
        $this->attributes['users'] = self::mutateToPgArray($value ?? []);
    }

    public function getUsersAttribute($value): ?array
    {
        return self::accessPgArray($value);
    }
}
