<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Echo_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(LogAcessoMiddleware::class)
    ->get('/', [PrincipalController::class, 'principal'])
    ->name('site.index');

Route::middleware(LogAcessoMiddleware::class)
    ->get('/sobreNos', [SobreNosController::class, 'sobreNos'])
    ->name('site.sobreNos');

Route::middleware(LogAcessoMiddleware::class)
    ->get('/contato', [ContatoController::class, 'contato'])
    ->name('site.contato');

Route::post('/contato', [ContatoController::class, 'salvar'])
    ->name('site.contato');

Route::get('/login', function () {
    return 'Login';
})->name('site.login');

//APP
Route::prefix('app')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');;

    Route::get('/produtos', function () {
        return 'Produtos Testea';
    })->name('app.produtos');;
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

//Caso o user tente acessar uma rota que não exista.
Route::fallback(function () {
    echo "A rota acessada não existe <a href=" . route('site.index') . "> Clique aqui para retornar. ";
});
