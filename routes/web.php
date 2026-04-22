<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;

Route::get('/', function () {
    return redirect('/campaign/kurban');
});

Route::get('/campaign/kurban', [CampaignController::class, 'show'])->name('campaign.show');
Route::get('/campaign/kurban/donate-now', [CampaignController::class, 'donate'])->name('campaign.donate');
Route::post('/campaign/kurban/donate', [CampaignController::class, 'donateSubmit'])->name('campaign.donate.submit');
Route::get('/campaign/kurban/invoice/{token}', [CampaignController::class, 'invoice'])->name('campaign.invoice');
Route::post('/campaign/kurban/load-more', [CampaignController::class, 'loadMoreDonations'])->name('campaign.load-more');
