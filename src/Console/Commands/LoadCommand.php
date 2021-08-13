<?php

namespace Antron\Ipa\Console\Commands;

use Illuminate\Console\Command;

class LoadCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ipa:load';

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
        self::createOct(\Antron\Ipa\Models\IpaOct4::class, self::getBitsOct4());

        self::createOct(\Antron\Ipa\Models\IpaOct3::class, self::getBitsOct3());

        self::createOct(\Antron\Ipa\Models\IpaOct2::class, self::getBitsOct2());

        \Artisan::call('ipa:count');

        return 0;
    }

    private static function createOct($class, $bitses)
    {

        $bits_heystack = $class::pluck('bits')
                ->toArray();

        foreach ($bitses as $bits) {
            if (!in_array($bits, $bits_heystack)) {
                $ipa_oct = new $class();

                $ipa_oct->bits = $bits;

                $ipa_oct->save();
            }
        }
    }

    private static function getBitsOct2()
    {
        $bitses = [];

        $ipa_oct3s = \Antron\Ipa\Models\IpaOct3::all();

        foreach ($ipa_oct3s as $ipa_oct3) {

            $bits = \Antron\Ipa\Ipa::getNetworkBits($ipa_oct3->bits);

            $bitses[$bits] = $bits;
        }

        return $bitses;
    }

    private static function getBitsOct3()
    {
        $bitses = [];

        $ipa_oct4s = \Antron\Ipa\Models\IpaOct4::all();

        foreach ($ipa_oct4s as $ipa_oct4) {

            $explode = explode('.', $ipa_oct4->bits);

            $bits = $explode[0] . '.' . $explode[1] . '.' . $explode[2];

            $bitses[$bits] = $bits;
        }

        return $bitses;
    }

    private static function getBitsOct4()
    {

        $bitses = [];

        $ipa_txts = file_get_contents(storage_path('ipa.txt'));

        foreach (explode("\n", $ipa_txts) as $bits) {
            if ($bits) {
                $bitses[] = $bits;
            }
        }

        foreach ($bitses as $bits) {
            $validator = \Illuminate\Support\Facades\Validator::make(['ip_address' => $bits], [
                        'ip_address' => 'required|ip'
            ]);
            if ($validator->fails()) {
                print 'Invalid IP address!' . $bits . "\n";

                return [];
            }
        }

        return $bitses;
    }

}
