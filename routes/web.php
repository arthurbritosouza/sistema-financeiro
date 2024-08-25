<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\TransicaoContoller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BancoController;
use App\Models\Contas;
use App\Models\User;
use App\Models\Banco;
use App\Models\Transicao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//login
Route::get('/', function () {
    return view('financeiro.login');
});

Route::get('login_auth', function(){
    return view('financeiro.login');
})->name('login');

Route::get('cadastrar', function(){
    return view('financeiro.cadastrar');
});
Route::post('cadastrar_conta', [LoginController::class, 'cadastrar_conta']);
Route::post('login_conta', [LoginController::class, 'login_conta']);
Route::get('logout', [LoginController::class, 'logout']);
//fim login


Route::middleware(['auth'])->group(function () {
//conta
Route::get('inicio', function(){
    $contas = Contas::where('user_id',Auth::user()->id)->get();
    $result = 0;
    return view('financeiro.inicio',['contas' => $contas,'result' => $result]);
})->name('inicio');

Route::get('add_conta', function(){
    return view('financeiro.add_conta');
})->name('add_conta');

Route::get('editar/{id}', function($id){
    $contas = Contas::where('id',$id)->first();
    return view('financeiro.editar',['contas' => $contas]);
});

Route::get('ver/{id}', function($id){
    $contas = Contas::where('user_id',Auth::user()->id)->where('id',$id)->first();
    return view('financeiro.ver', ['contas' => $contas]);
});
Route::post('adicionar_fatura',[FinanceiroController::class,'adicionar_fatura'])->name('adicionar_fatura');
Route::post('editar_fatura/{id}',[FinanceiroController::class,'editar_fatura'])->name('editar_fatura');
Route::get('excluir_conta/{id}',[FinanceiroController::class,'excluir_conta'])->name('excluir_conta');
Route::post('search',[FinanceiroController::class, 'search'])->name('search');
//fim conta



//BANCO
Route::get('/banco', function(){
    $banco = Banco::where('user_id',Auth::user()->id)->first();
    $transicao = Transicao::where('user_id',Auth::user()->id)->get();
    $date = Transicao::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->select('data_pagamento')->first();
    //dd($date);
    //dd($banco);
    return view('financeiro.banco',['banco' => $banco,'transicao' => $transicao,'date' => $date]);
})->name('banco');
Route::post('/editar_saldo',[FinanceiroController::class,'editar_saldo'])->name('editar_saldo');
//fim banco



//transicao
Route::get('/pagar_fatura/{id}',[TransicaoContoller::class,'pagar_fatura'])->name('pagar_fatura');
});