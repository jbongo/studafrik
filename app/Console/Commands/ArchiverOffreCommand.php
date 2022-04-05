<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Offre;

class ArchiverOffreCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'archiveroffre';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archives les offres expirées';

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
        $offres = Offre::where('date_expiration','<',date('Y-m-d'))
        ->update(['archive' => 1]);

    }
}
