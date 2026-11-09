<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    //

    use HasFactory;

    protected $table =  "marcas";
     
    protected $fillable = [
        'nome',
        'imagem'

    ];
    public function rules(){
       return [
            'nome' => 'required|unique:marcas,nome,' . $this->id . '|min:5|max:100',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
    public function feedback(){
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome deve ter no mínimo 5 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'imagem.required' => 'O campo imagem é obrigatório',
            'imagem.image' => 'O campo imagem deve ser uma imagem',
            'imagem.mimes' => 'O campo imagem deve ser um arquivo do tipo: jpeg, png, jpg, gif, svg',
            'imagem.max' => 'O campo imagem deve ter no máximo 2048 kilobytes'
        ];
    }
}
