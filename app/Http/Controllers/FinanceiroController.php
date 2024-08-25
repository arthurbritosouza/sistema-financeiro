<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contas;
use App\Models\User;
use App\Models\Banco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FinanceiroController extends Controller
{

    public function adicionar_fatura(Request $request){

        $c = new Contas;
        $c->user_id = Auth::user()->id;
        $c->descricao = $request->get('descricao');
        $c->valor = $request->get('valor');
        $c->data_vencimento = $request->get('vencimento');
        $c->status = $request->get('status');
        $c->save();
    return redirect()->route('inicio'); 
    }

    public function editar_fatura(Request $request,$id){
        $data = [ 
            'descricao' => $request->get('descricao'),
            'valor' =>$request->get('valor'),
            'data_vencimento' =>$request->get('vencimento'),
            'data_pagamento' =>$request->get('pagamento'),
            'status' => $request->get('status')

        ];
        Contas::where('id',$id)->update($data);
        return redirect()->route('inicio');

    }
    public function excluir_conta($id){
        Contas::where('id',$id)->delete();
        return redirect()->route('inicio');
    }

    public function search(Request $request){
        
        $descricao = $request->get('descricao');
        $vencimento = $request->get('vencimento');
        $status = $request->get('status');

        $result = Contas::orWhere('descricao', 'like', '%' . $descricao . '%')
        ->where(function ($query) use ($vencimento, $status) {
            if ($vencimento) {
                $query->where('data_vencimento', $vencimento);
            }
            if ($status) {
                $query->where('status', $status);
            }

        })->get();
        if ($descricao || $vencimento || $status) {
            return view('financeiro.search', [
                'result' => $result,
                'descricao' => $descricao,
                'vencimento' => $vencimento,
                'status' => $status
            ])->with('success', 'Pesquisa Efetuada');
        } else {
            return redirect()->route('inicio')
                ->with('error', 'Não foi possível fazer a pesquisa');
        }    
    }
    
    public function editar_saldo(Request $request){
        $saldo = $request->get('saldo');
        Banco::where('user_id',Auth::user()->id)->update(['saldo' => $saldo]);
        return redirect()->route('banco')->with('success','Editado com Sucesso');
    }
}