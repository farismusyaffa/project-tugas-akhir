<?php

namespace App\Models;

use App\Models\Platform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function platform(){
        return $this->belongsTo(Platform::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fasilitator(){
        return $this->belongsTo(Fasilitator::class);
    }
}
