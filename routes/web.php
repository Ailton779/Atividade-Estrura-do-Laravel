    <?php

    use App\Http\Controllers\UsuarioController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PaginaController;
    use App\Http\Controllers\ProductController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('products', ProductController::class);