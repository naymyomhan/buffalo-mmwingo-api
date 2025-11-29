<?php

namespace App\Services;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

class NewsScraperService
{
    protected $client;
    protected $baseUrl = 'https://mysportmyanmar.com';

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    public function fetchArticleLinks(string $categoryPath = '/category/all/football/')
    {
        $response = $this->client->request('GET', $this->baseUrl . $categoryPath);
        $html = $response->getContent();

        $crawler = new Crawler($html);

        return $crawler->filter('div.withGrid.one-three > a')->each(function (Crawler $node) {
            return $node->attr('href');
        });
    }

    // public function fetchArticleContent(string $url)
    // {
    //     $response = $this->client->request('GET', $url);
    //     $html = $response->getContent();

    //     $crawler = new Crawler($html);

    //     $title = $crawler->filter('h1.entry-title')->count()
    //         ? $crawler->filter('h1.entry-title')->text()
    //         : 'No Title';

    //     $content = '';
    //     if ($crawler->filter('div.post-content')->count()) {
    //         $crawler->filter('div.post-content p')->each(function (Crawler $node) use (&$content) {
    //             $text = trim($node->text());
    //             if (!empty($text)) {
    //                 $content .= $text . "\n";
    //             }
    //         });
    //     }

    //     return [
    //         'url' => $url,
    //         'title' => $title,
    //         'content' => trim($content),
    //     ];
    // }

    public function fetchArticleContent(string $url)
    {
        $response = $this->client->request('GET', $url);
        $html = $response->getContent();

        $crawler = new Crawler($html);

        // Extract title
        $title = $crawler->filter('h1.entry-title')->count()
            ? $crawler->filter('h1.entry-title')->text()
            : 'No Title';

        // Extract content
        $content = '';
        if ($crawler->filter('div.post-content')->count()) {
            $crawler->filter('div.post-content p')->each(function (Crawler $node) use (&$content) {
                $text = trim($node->text());
                if (!empty($text)) {
                    $content .= $text . "\n";
                }
            });
        }

        // Extract first image
        $imageUrl = null;
        if ($crawler->filter('div.fusion-post-slideshow ul.slides li img')->count()) {
            $imageUrl = $crawler->filter('div.fusion-post-slideshow ul.slides li img')->first()->attr('src');
        }

        return [
            'url' => $url,
            'title' => $title,
            'image' => $imageUrl,
            'content' => trim($content),
        ];
    }


    public function fetchAllArticles()
    {
        $urls = $this->fetchArticleLinks();
        $articles = [];

        foreach ($urls as $url) {
            $articles[] = $this->fetchArticleContent($url);
        }

        return $articles;
    }
}
