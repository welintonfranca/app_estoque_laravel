<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    public function pesquisar(){
        $produtos = Produto::all();
        foreach ($produtos as $produto){
            echo $produto->descricao . "<br>";
        }

    }
}
