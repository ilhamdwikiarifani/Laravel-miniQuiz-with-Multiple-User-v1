<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result_Exam extends Model
{
    use HasFactory;

    protected $table = 'result__exams';

    protected $fillable = ['user_id', 'benar', 'salah', 'jumlahSoal', 'overall'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
