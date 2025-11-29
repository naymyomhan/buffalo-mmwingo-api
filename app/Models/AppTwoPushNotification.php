<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\File;

class AppTwoPushNotification extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'message',
        'url',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('notifications')
            ->acceptsFile(function (File $file) {
                $allowedMimeTypes = [
                    'image/jpeg',
                    'image/jpg',
                    'image/png',
                    'image/webp',
                    'image/gif',
                ];
                return in_array($file->mimeType, $allowedMimeTypes);
            })
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    }

    public function sendNotification($id)
    {
        $notification = AppTwoPushNotification::find($id);
        if ($notification) {
            $image = $notification->getFirstMediaUrl('notifications', 'thumb');

            $body = [
                "app_id" => "1af2c245-7f5f-45ca-8173-82a493e90805",
                'contents' => [
                    'en' => $notification->message,
                ],
                'headings' => [
                    'en' => $notification->title,
                ],
                'included_segments' => ['All'],
            ];
            if ($notification->url != null) {
                $body['url'] = $notification->url;
            }

            if ($image) {
                $body['big_picture'] = $image;
            }

            Http::withHeaders([
                'Authorization' => 'os_v2_app_dlzmerl7l5c4valtqksjh2iiavvyonwkydbuveeuzksprqyw3hamnr37ot7uebdkxgtvjrynxjfxcq76naej4sqviq4vd5wgbmewszi',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post('https://api.onesignal.com/notifications?c=push', $body);
        }
    }
}
