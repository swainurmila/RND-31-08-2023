<?php

namespace App\Console\Commands;

use App\Mail\CompleteApplyMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail for entrance admit card';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $recipient = DB::table("phd_entrances")->whereIn('is_selected', [1,2])->get();
        foreach ($recipient as $key => $val) {

            // $encrypted = Crypt::encryptString($val->id);
            $details = [
                "name"   => $val->name,
                'ref_no' => $val->registration_no,
                'id'     => $val->id,
            ];
            Mail::to($val->email)->send(new CompleteApplyMail($details));
        }
        $this->info('Email send successfully.');
    }
}
