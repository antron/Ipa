<?php

namespace Antron\Ipa\Console\Commands;

use Illuminate\Console\Command;

class CountCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ipa:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        foreach (\Antron\Ipa\Models\IpaOct3::all() as $ipa_oct3) {
            $count = \Antron\Ipa\Models\IpaOct4::where('bits', 'LIKE', $ipa_oct3->bits . '.%')->count();

            $ipa_oct3->assigned = $count;
            
            if($count){
                $ipa_oct3->status=5;
            }

            $ipa_oct3->save();
        }
        
        foreach (\Antron\Ipa\Models\IpaOct2::all() as $ipa_oct2) {
            $count = \Antron\Ipa\Models\IpaOct4::where('bits', 'LIKE', $ipa_oct2->bits . '.%')->count();

            $ipa_oct2->assigned = $count;

            $ipa_oct2->save();
        }

        return 0;
    }

}
