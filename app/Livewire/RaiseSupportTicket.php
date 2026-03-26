<?php

namespace App\Livewire;

use App\Models\BugReport;
use App\Models\User;
use App\Notifications\BugReportReceived;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Notification;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RaiseSupportTicket extends Component
{
    use LivewireAlert;

    public bool $showRaiseSupportTicketModal = false;
    public string $step = 'form'; // form | success

    #[Validate('required|string')]
    public string $category = '';

    #[Validate('required|string|min:5|max:150')]
    public string $subject = '';

    #[Validate('required|string|min:20|max:2000')]
    public string $description = '';

    #[On('showRaiseSupportTicket')]
    public function showRaiseSupportTicket(): void
    {
        $this->reset(['category', 'subject', 'description', 'step']);
        $this->step = 'form';
        $this->showRaiseSupportTicketModal = true;
    }

    public function submit(): void
    {
        $this->validate();

        $report = BugReport::create([
            'user_id'       => auth()->id(),
            'restaurant_id' => auth()->user()->restaurant_id ?? null,
            'category'      => $this->category,
            'subject'       => $this->subject,
            'description'   => $this->description,
        ]);

        // Send to superadmin
        try {
            $superadmin = User::withoutGlobalScopes()
                ->whereNull('restaurant_id')
                ->whereNull('branch_id')
                ->first();

            if ($superadmin) {
                Notification::send($superadmin, new BugReportReceived($report));
            }
        } catch (\Exception $e) {
            \Log::error('BugReport email failed: ' . $e->getMessage());
        }

        $this->step = 'success';
    }

    public function closeModal(): void
    {
        $this->showRaiseSupportTicketModal = false;
        $this->reset(['category', 'subject', 'description', 'step']);
    }

    public function render()
    {
        return view('livewire.raise-support-ticket', [
            'categories' => BugReport::$categories,
        ]);
    }
}
