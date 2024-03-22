<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Say "Hello, World"';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dump('Hello, World');
    }
}
