<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class baju extends Model
{
    use HasFactory;
    protected $fillable=['nama_baju','size','harga_perhari','cover'];

    public function sewa():HasMany{
        return $this->hasMany(sewa::class);
    }
}
