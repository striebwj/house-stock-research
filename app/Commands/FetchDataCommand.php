<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use LaravelZero\Framework\Commands\Command;

class FetchDataCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'fetch';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Fetch the data from housestockwatcher';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'https://house-stock-watcher-data.s3-us-west-2.amazonaws.com/data/all_transactions.json';

        $transactionData = Http::get($url)->body();

        $date = now();

        Storage::put("/data/{$date}.json", $transactionData);
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule)
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
