<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;


class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {

        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%' . $request->input('nome'))
            ->where('site', 'like', '%' . $request->input('site'))
            ->where('uf', 'like', '%' . $request->input('uf'))
            ->where('email', 'like', '%' . $request->input('email'))
            ->paginate(10);


        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';
        // Inclusão
        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
                'uf.min' => 'O campo nome deve ter no mínimo 2 caracteres.',
                'uf.max' => 'O campo nome deve ter no máximo 2 caracteres.',
                'email.email' => 'O campo e-mail não foi preenchido corretamente.'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro Realizado Com Sucesso!!!';
        }

        // Edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->id);
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = "Atualização realizado com sucesso!!!";
            } else {
                $msg =  "Atualização Apresentou Problemas!!!";
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        $msg = '';
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id, $msg = '')
    {
        echo "Excluir o registro $id";

        $msg = '';
        $delete = Fornecedor::find($id)->delete();

        if ($delete) {
            $msg = 'Deletado com sucesso!';
        } else {
            $msg = 'Erro ao deletar registro!';
        }

        return redirect('app.fornecedor', ['msg' => $msg]);
    }

    public function teste($id)
    {
        echo "Teste<br>";
    }
}
