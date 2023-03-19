<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Pengaduan;

class Tanggapan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tanggapans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'petugas_id',
        'pengaduan_id',
        'isi_tanggapan',
        'tanggal_tanggapan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the petugas that owns the Tanggapan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function petugas(): BelongsTo
    {
        return $this->belongsTo(Petugas::class, 'petugas_id', 'id');
    }

    /**
     * Get the pengaduan that owns the Tanggapan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengaduan(): BelongsTo
    {
        return $this->belongsTo(Pengaduan::class, 'pengaduan_id', 'id');
    }
}
