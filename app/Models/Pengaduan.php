<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pengaduans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'kategori_pengaduan_id',
        'judul_pengaduan',
        'isi_pengaduan',
        'tanggal_kejadian',
        'lokasi_kejadian',
        'bukti_foto',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the user that owns the Pengaduan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the kategori_pengaduan that owns the Pengaduan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori_pengaduan(): BelongsTo
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_pengaduan_id', 'id');
    }

    /**
     * Get the tanggapan associated with the Pengaduan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tanggapan(): HasOne
    {
        return $this->hasOne(Tanggapan::class, 'pengaduan_id');
    }
}
