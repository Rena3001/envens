<?php

use App\Http\Controllers\Front\ServicesController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\EventRequestController;
use App\Http\Controllers\Front\GalleryController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Language redirect
|--------------------------------------------------------------------------
|
| Əgər istifadəçi URL-də dil prefiksi (az, en, ru) göstərməyibsə,
| avtomatik olaraq /az versiyasına yönləndirilir.
|
*/
Route::get('/', function () {
    return redirect('/az');
});

Route::get('{any}', function ($any) {
    // Əgər birinci hissə dil kodu deyilsə → /az/... yönləndir
    $firstSegment = explode('/', $any)[0];
    if (!in_array($firstSegment, ['az', 'en', 'ru'])) {
        return redirect('/az/' . $any);
    }

    // Əks halda routelar bu bloka düşməməlidir
    return abort(404);
})->where('any', '.*')->fallback();

/*
|--------------------------------------------------------------------------
| Language switcher
|--------------------------------------------------------------------------
|
| Dil dəyişmə route-u (məsələn: /lang/az)
|
*/
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['az', 'en', 'ru'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('change.language');

/*
|--------------------------------------------------------------------------
| Localized routes
|--------------------------------------------------------------------------
|
| Bütün əsas səhifələr az/en/ru prefiksinə bağlıdır.
|
*/
Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'az|en|ru']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::post('/event-request', [EventRequestController::class, 'store'])->name('event.request.store');
    Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries');

    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/service/details/{id}', [ServicesController::class, 'details'])->name('service.details');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    // 404 səhifəsi yalnız bu lokal qrupun içində işləsin
    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });
});
