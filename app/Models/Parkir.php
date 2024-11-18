<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;
    protected $table = 'parkir';
    protected $guarded = ['id'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function tarif()
    {
    	return $this->belongsTo(Tarif::class, 'id_tarif', 'id');
    }
}
