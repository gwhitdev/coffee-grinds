<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', \App\Http\Livewire\TestForm::class);
Route::get('/brands/{brand}/delete', function(int $brand) {
    $brand = \App\Models\Brand::find($brand);
    $brand->delete();
    return redirect('/form');
})->name('brand.destroy');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('user')->middleware(['auth:sanctum','can:view,App\Models\DrinkingEvent'])->group(function () {
   Route::get('/dashboard/drinkings', \App\Http\Livewire\User\Pages\DrinkingEvent\UserDrinkingEventPage::class)->name('user.drinkingEvent.index');
   Route::get('/dashboard/suppliers', \App\Http\Livewire\User\Pages\Supplier\UserSupplierPage::class)->name('user.supplier.index');

});

Route::prefix('manage')->middleware(['auth:sanctum','isAdmin'])->group(function () {
    Route::get('/', \App\Http\Livewire\Manage\Pages\Dashboard\AdminPanel::class)->name('admin.dash');

    Route::get('/brands', \App\Http\Livewire\Manage\Pages\Brand\BrandPage::class)->name('brands.index');
    Route::delete('/brands/{id}/delete', [\App\Http\Controllers\BrandController::class, 'delete'])->name('brands.delete');

    Route::get('/coffee-types', \App\Http\Livewire\Manage\Pages\CoffeeTypes\CoffeeTypesPage::class)->name('coffeeTypes.index');
    Route::delete('/coffee-types/{id}/delete', [\App\Http\Controllers\CoffeeTypesController::class, 'delete'])->name('coffeeTypes.delete');
    Route::post('/coffee-types/{id}/edit', [\App\Http\Controllers\CoffeeTypesController::class, 'edit'])->name('coffeeTypes.edit');

    Route::get('/drinking-events', \App\Http\Livewire\Manage\Pages\Events\EventsPage::class)->name('drinkingEvents.index');
    Route::delete('/drinking-events/{id}/delete', [\App\Http\Controllers\DrinkingEventsController::class, 'delete'])->name('drinkingEvents.delete');

    Route::get('/drinking-locations', \App\Http\Livewire\Manage\Pages\Locations\LocationsPage::class)->name('drinkingLocations.index');
    Route::delete('/drinking-locations/{id}/delete', [\App\Http\Controllers\DrinkingLocationsController::class, 'delete'])->name('drinkingLocations.delete');
    Route::post('/drinking-locations/{id}/edit', [\App\Http\Controllers\DrinkingLocationsController::class, 'edit'])->name('drinkingLocations.edit');

    Route::get('/suppliers', \App\Http\Livewire\Manage\Pages\Suppliers\SuppliersPage::class)->name('suppliers.index');
    Route::delete('/suppliers/{id}/delete', [\App\Http\Controllers\SupplierController::class, 'delete'])->name('suppliers.delete');
    Route::post('/suppliers/{id}/edit', [\App\Http\Controllers\SupplierController::class, 'edit'])->name('suppliers.edit');

    Route::get('/users', \App\Http\Livewire\Manage\Pages\Users\UsersPage::class)->name('manage.users.index');
    Route::delete('/users/{id}/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('manage.users.delete');
    Route::get('/users/{user}/edit', \App\Http\Livewire\Manage\Pages\Users\EditUserPage::class)->name('manage.users.edit');
    //Route::post('/users/{id}/edit', [\App\Http\Controllers\UserController::class, 'update'])->name('users.manage.update');


    Route::get('/drink-types', \App\Http\Livewire\Manage\Pages\DrinkTypes\DrinkTypesPage::class)->name('drinkTypes.index');
    Route::delete('/drink-types/{id}/delete', [\App\Http\Controllers\DrinkTypesController::class, 'delete'])->name('drinkTypes.delete');
    Route::post('/drink-types/{id}/edit', [\App\Http\Controllers\DrinkTypesController::class, 'edit'])->name('drinkTypes.edit');
});

