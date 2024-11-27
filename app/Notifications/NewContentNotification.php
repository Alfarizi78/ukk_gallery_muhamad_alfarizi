<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewContentNotification extends Notification
{
    private $content;
    private $type;

    public function __construct($content, $type)
    {
        $this->content = $content;
        $this->type = $type;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Konten Baru: {$this->type}")
            ->line("Ada {$this->type} baru yang ditambahkan:")
            ->line($this->getContentDetail())
            ->action('Lihat Detail', $this->getUrl())
            ->line('Terima kasih telah menggunakan aplikasi gallery sekolah!');
    }

    public function toArray($notifiable)
    {
        return [
            'type' => $this->type,
            'content_id' => $this->content->id,
            'title' => $this->getContentDetail(),
            'url' => $this->getUrl(),
        ];
    }

    private function getContentDetail()
    {
        switch($this->type) {
            case 'post':
                return "Post: {$this->content->post_judul}";
            case 'album':
                return "Album: {$this->content->album_name}";
            default:
                return '';
        }
    }

    private function getUrl()
    {
        switch($this->type) {
            case 'post':
                return route('admin.posts.show', $this->content->post_id);
            case 'album':
                return route('admin.albums.show', $this->content->album_id);
            default:
                return '';
        }
    }
} 