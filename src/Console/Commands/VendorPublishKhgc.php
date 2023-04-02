<?php

namespace Khgc\Cms\Console\Commands;

use Illuminate\Console\Command;

class VendorPublishKhgc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'KHGC:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Khgc publish';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('vendor:publish', [
            '--tag' => [
                'khgc-lang',
                'khgc-migration',
                'khgc-public',
                'khgc-views',
            ],
        ]);
    }
}
