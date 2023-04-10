<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\EspeceController;
use App\Http\Controllers\FormulaireController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $articles = App\Models\Article::all();
    $articlesRupture = false;

    foreach ($articles as $article) {
        if ($article->quantite_dispo <= 10) {
            $articlesRupture = true;
            break;
        }
    }

    return view('dashboard', [
        'articles' => $articles,
        'articlesRupture' => $articlesRupture,
    ]);
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('articles', ArticleController::class);
Route::resource('couleurs', CouleurController::class);
Route::resource('evenements', EvenementController::class);
Route::resource('sousCategories', SousCategorieController::class);
Route::resource('categories', CategorieController::class);
Route::resource('unites', UniteController::class);
Route::resource('especes', EspeceController::class);
Route::resource('formulaires', FormulaireController::class);

require __DIR__ . '/auth.php';
