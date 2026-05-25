    <?php

    use App\Http\Controllers\UsuarioController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PaginaController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/usuarios',function(){

        return "Rota de usuários";
    });


    Route::get('/ola',function(){

        return "Olá Laravel!";
    });


    Route::get('/curso/ads',function(){

        return "Curso de Analise e Desenvolvimento de Sistemas";
    });

    Route::get('/curso/web',function(){

        return "Disciplina Programação Web 1";
    });

    Route::get('/sobre',function(){

        return view('sobre');
    });

    Route::get('/contato',function(){

        return view('contato');
    });

    Route::get('/institucional/missao',function(){

        return view('institucional.missao');
    }); 

    Route::get('/empresa', [PaginaController::class, 'empresa']);

    Route::get('/servicos', [PaginaController::class, 'servicos']);

    Route::get('/portfolio', [PaginaController::class, 'portfolio']);

    Route::get('/blog', [PaginaController::class, 'blog']);

    Route::get('/equipe', [PaginaController::class, 'equipe']);//Sem o controller ele retornou Call to undefined method App\Http\Controllers\PaginaController::equipe()

    Route::get('/usuario/{nome}', function ($nome) {
    return "Usuário: " . $nome;
    });

    Route::get('/produto/{id}', [PaginaController::class, 'produto']);