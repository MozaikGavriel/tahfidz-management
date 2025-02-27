<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;

class WhatsappNotification extends Notification
{
    use Queueable;
    protected $santri;
    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
        $this->santri = $santri;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['twilio'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toTwilio($notifiable)
    // {
    //     $client = new Client(config('services.twilio.sid'), config('services.twilio.token'));

    //     $message = "Assalamu'alaikum, hafalan santri atas nama {$this->santri->nama} telah selesai. Barakallah!";

    //     $client->messages->create(
    //         $notifiable->phone, // Nomor WhatsApp orang tua
    //         [
    //             'from' => config('services.twilio.from'),
    //             'body' => $message,
    //         ]
    //     );
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
