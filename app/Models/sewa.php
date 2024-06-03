<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sewa extends Model
{
    use HasFactory;
    protected $fillable=['name','phone', 'tanggal_peminjaman','tanggal_pengembalian','totalharga_sewa','status','baju_id','user_id'];

public function baju()
    {
        return $this->belongsTo(baju::class, 'baju_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}