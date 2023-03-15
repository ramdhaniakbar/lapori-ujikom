<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriPengaduan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategori_pengaduans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get all of the pengaduan for the KategoriPengaduan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengaduan(): HasMany
    {
        return $this->hasMany(Pengaduan::class, 'kategori_pengaduan_id');
    }
}
