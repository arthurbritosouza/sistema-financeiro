<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banco;
use App\Models\Transicao;
use App\Models\Contas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransicaoContoller extends Controller
{
    public function pagar_fatura($id){
        $valorString = Contas::where('user_id',Auth::user()->id)->where('id',$id)->value('valor');
        $valor = (float) str_replace(',', '.', $valorString);
        $saldoString = Banco::where('user_id',Auth::user()->id)->value('saldo');
        $saldo = (float) str_replace(',', '.', $saldoString);
        $hoje = date('y/m/d');

        if($saldo >= $valor){
          $valor_final = ($saldo - $valor);
          $valorFinal_String = str_replace('.', ',', $valor_final);
          $conta = Contas::where('user_id',Auth::user()->id)->where('id',$id)->first(); 

          $transicao = new Transicao;
          $transicao->conta = $id;
          $transicao->user_id = Auth::user()->id;
          $transicao->descricao = $conta->descricao;
          $transicao->data_pagamento = $hoje;
          $transicao->valor_conta = $valorString;
          $transicao->valor_banco = $saldoString;
          $transicao->valor_final = $valor_final;
          $transicao->save();

          Contas::where('user_id',Auth::user()->id)->where('id',$id)->update([
            'data_pagamento' => $hoje,
            'status' => 1
          ]);
          Banco::where('user_id',Auth::user()->id)->update([
            'saldo' => $valorFinal_String
            ]);
            return redirect()->route('inicio')->with('pagamento_realizado', 'Pagamento realizado com sucesso!');
          //echo 'cadastrou';
        }else{
            return redirect()->route('inicio')->with('saldo_insuficiente', 'Saldo insuficiente!');
        }
    }
}
