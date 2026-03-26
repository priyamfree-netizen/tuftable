<?php

namespace App\Notifications;

use App\Models\BugReport;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BugReportReceived extends Notification
{
    use Queueable;

    public function __construct(protected BugReport $report) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $categories = \App\Models\BugReport::$categories;
        $categoryLabel = $categories[$this->report->category] ?? ucfirst($this->report->category);
        $restaurant = $this->report->restaurant;
        $reporter = $this->report->user;

        return (new MailMessage)
            ->subject("[Bug Report] [{$categoryLabel}] {$this->report->subject}")
            ->greeting('New Bug Report Received')
            ->line("**Category:** {$categoryLabel}")
            ->line("**Subject:** {$this->report->subject}")
            ->line("**Restaurant:** " . ($restaurant?->name ?? 'N/A') . " (ID: " . ($restaurant?->id ?? 'N/A') . ")")
            ->line("**Reported By:** {$reporter->name} ({$reporter->email})")
            ->line("**Description:**")
            ->line($this->report->description)
            ->line("---")
            ->line("Reported at: " . $this->report->created_at->format('d M Y, h:i A'));
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
