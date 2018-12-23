<?php

namespace App\Console\Commands;

use App\Models\Ads;
use Illuminate\Console\Command;

class ClearAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ads:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear old ads';

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
     * @return mixed
     */
    public function handle()
    {
        //
        Ads::where('end_at', '<', time())->delete();
    }
}
