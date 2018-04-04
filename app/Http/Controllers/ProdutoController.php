<?php

namespace App\Http\Controllers;
use App\Produto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

class ProdutoController extends Controller
{
    public function pesquisar()
    {
        // Recebe o conteúdo elemento 'descricao' do formulário
        $descricao = Input::get('descricao');

        // Busca produtos com o conteúdo da $descricao
        $produtos = Produto::where('descricao', 'like', '%'.$descricao.'%')->get();

        // Chama a view produto.pesquisar e envia os produtos encontrados
        return view('produto.pesquisar')->with('produtos', $produtos);

    }
    public function mostrar_inserir()
    {
        return view('produto.inserir');
    }
    public function inserir()
    {
        // Criando um novo objeto do tipo produto
        $produto = new Produto();

        //Colocando os valores recebidos do formulario nos atributos do objeto $produto
        $produto->descricao = Input::get('descricao');
        $produto->quantidade = Input::get('quantidade');
        $produto->valor = Input::get('valor');
        $produto->data_vencimento = Input::get('data_vencimento');

        // Salvando no banco de dados
        $produto->save();

        // Criado uma mensagem para o usuário
        $mensagem = "Produto inserido com sucesso";

        // Chamando a view produto.inserir e enviando a mensagem criada
        return view('produto.inserir')->with('mensagem', $mensagem);
    }
}
