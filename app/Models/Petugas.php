<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petugas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'petugas';

    protected $guard = 'petugas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'telepon',
        'foto',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get all of the tanggapan for the Petugas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tanggapan(): HasMany
    {
        return $this->hasMany(Tanggapan::class, 'petugas_id');
    }
}
