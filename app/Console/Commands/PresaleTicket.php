<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PresaleTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:presale-ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = Event::where([
            'is_draft' => true,
            'presale_date' => Carbon::today()
        ])->get();

        foreach ($events as $event) {
            $event->update([
                'is_draft' => false
            ]);
        }
    }
}
