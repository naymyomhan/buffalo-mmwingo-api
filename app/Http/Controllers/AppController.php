<?php

namespace App\Http\Controllers;

use App\Models\AppTwoContactLink;
use App\Models\SettingTwo;
use App\Services\NewsScraperService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppController extends Controller
{
    use ResponseTrait;

    public function postsTwo(NewsScraperService $scraper)
    {
        $posts = $scraper->fetchAllArticles();

        foreach ($posts as $index => &$post) {
            $post['created_at'] = Carbon::today()->subDays($index)->format('M d, Y');
            $post['id'] = $index + 1;
        }

        $links = AppTwoContactLink::all();

        $setting = SettingTwo::first();

        $data = [
            'can_load_more' => false,
            'posts' => $posts,
            'links' => $links,
            'links_title' => $setting->contact_title,
            'privacy_policy' => $setting->privacy_policy,
        ];

        return $this->success('Get posts', $data);
    }
}
