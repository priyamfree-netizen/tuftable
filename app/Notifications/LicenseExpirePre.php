<?php

namespace App\Notifications;

use App\Models\Restaurant;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class LicenseExpirePre extends BaseNotification
{
    use Queueable;

    protected $restaurant;

    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $siteName = global_setting()->name;
        $build = parent::build($notifiable);

        $expireDate = \Carbon\Carbon::parse($this->restaurant->license_expire_on)
            ->translatedFormat($this->restaurant->date_format ?? 'd M Y');

        $daysLeft = now()->startOfDay()->diffInDays(
            \Carbon\Carbon::parse($this->restaurant->license_expire_on)->startOfDay(),
            false
        );

        return $build
            ->subject("Your {$siteName} plan expires in {$daysLeft} day(s)")
            ->greeting("Hello {$notifiable->name},")
            ->line("This is a reminder that your subscription plan will expire on **{$expireDate}**.")
            ->line("To continue using all features without interruption, please renew your plan before the expiry date.")
            ->action('Renew Plan', route('pricing.plan'))
            ->line("If you have already renewed, please ignore this email.");
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
