<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AskExpert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendContactEmails extends Command
{
    /**
     *  php artisan email:send-contacts
     */
    protected $signature = 'email:send-contacts';

    /**
     * after create mail logic
     */
    protected $description = 'Send unsent contact requests to experts and update status';

    public function handle()
    {
        //// better to select only grouped columns and IDs so that the status can be updated
        $unsendContacts = AskExpert::where('mail_status', 'unsend')
            ->select('id', 'email', 'ip_address', 'name', 'subject', 'question', 'file', DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H') as eDate"))
            ->groupBy('ip_address', 'email', 'eDate')
            ->get();

        if ($unsendContacts->isEmpty()) {
            $this->info('No unsent contacts found.');
            return Command::SUCCESS;
        }

        foreach ($unsendContacts as $contact) {
            try {

                // Mail::to('admin@example.com')->send(new YourMailClass($contact));  --- to send mail logic

                // 3. Status update if mail goes successfully (using secure ID)
                AskExpert::where('id', $contact->id)->update([
                    'mail_status' => 'send'
                ]);

                $this->info("Email sent and status updated for ID: {$contact->id}");
            } catch (\Exception $e) {
                $this->error("Failed to send email for ID {$contact->id}: " . $e->getMessage());
            }
        }

        $this->info('All pending emails processed successfully.');
        return Command::SUCCESS;
    }
}
