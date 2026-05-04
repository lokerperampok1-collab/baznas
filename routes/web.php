<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\PakasirCallbackController;

Route::get('/', function () {
    return redirect('/campaign/kurban');
});

Route::get('/campaign/kurban', [CampaignController::class, 'show'])->name('campaign.show');
Route::get('/campaign/kurban/donate-now', [CampaignController::class, 'donate'])->name('campaign.donate');
Route::post('/campaign/kurban/donate', [CampaignController::class, 'donateSubmit'])->name('campaign.donate.submit');
Route::get('/campaign/kurban/invoice/{token}', [CampaignController::class, 'invoice'])->name('campaign.invoice');
Route::post('/campaign/kurban/load-more', [CampaignController::class, 'loadMoreDonations'])->name('campaign.load-more');

Route::post('/pakasir/callback', [PakasirCallbackController::class, 'handle'])->name('pakasir.callback');

// Admin /purno Routes
use App\Http\Controllers\Admin\AdminCampaignController;
Route::prefix('purno')->group(function () {
    Route::get('/', [AdminCampaignController::class, 'index'])->name('admin.purno.index');
    Route::post('/store', [AdminCampaignController::class, 'store'])->name('admin.purno.store');
    Route::post('/update/{id}', [AdminCampaignController::class, 'update'])->name('admin.purno.update');
    Route::delete('/delete/{id}', [AdminCampaignController::class, 'destroy'])->name('admin.purno.delete');
    Route::patch('/toggle/{id}', [AdminCampaignController::class, 'toggleStatus'])->name('admin.purno.toggle');
});
