<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'orçamento',
        'img',
        'user_id', // Adicione user_id aos campos preenchíveis
    ];
    //sem isso aqui não manda os valores pro banco 
    public function user()
{
    return $this->belongsTo(User::class);
}
}
