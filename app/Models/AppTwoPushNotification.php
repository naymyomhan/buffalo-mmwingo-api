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
                "app_id" => env('ONESIGNAL_APP_ID'),
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
                $body['big_picture'] = $image ?? null;
            }

            Http::withHeaders([
                'Authorization' => env('ONESIGNAL_REST_API_KEY'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post('https://api.onesignal.com/notifications?c=push', $body);
        }
    }
}
