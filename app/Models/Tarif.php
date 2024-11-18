<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    protected $table = 'tarif';
    protected $guarded = ['id'];

    public function parkir()
    {
    	return $this->hasMany(Parkir::class, 'id_tarif', 'id');
    }
}
