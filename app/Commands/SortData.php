<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use LaravelZero\Framework\Commands\Command;

class SortData extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'sort';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Sort the data from housestockwatcher';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $storagePath = storage_path('data');
        $file = collect(File::allFiles($storagePath))->last();

        $transactionData = Storage::get(storage_path("data/{$file->getRelativePathname()}"));
        dd($transactionData);


        $transactionData =

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
