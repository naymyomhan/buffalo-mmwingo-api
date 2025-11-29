<?php

use App\Http\Controllers\AppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

Route::get('/posts_two', [AppController::class, 'postsTwo']);

use App\Services\NewsScraperService;

Route::get('/scrape-news', function (NewsScraperService $scraper) {
    $articles = $scraper->fetchAllArticles();

    foreach ($articles as $index => &$article) {
        $article['created_at'] = Carbon::today()->subDays($index)->format('M d, Y');
        $article['id'] = $index + 1;
    }

    return response()->json($articles);
});
