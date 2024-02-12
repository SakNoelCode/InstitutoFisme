<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallAppLocalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para ejeuctar la aplicación el Local';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $command_1 = Artisan::call('key:generate');
            $command_2 = Artisan::call('migrate');
            $command_3 = Artisan::call('db:seed');
            $command_4 = Artisan::call('storage:link');

            if ($command_1 !== 0 || $command_2 !== 0 || $command_3 !== 0) {
                $this->error('Ups, algo salió mal');
            } else {
                $this->info('Key generada');
                $this->info('Migración ejecutada');
                $this->info('Seeder ejecutados');
                $this->info('Storage link ejecutado');
            }
        } catch (Exception $e) {
            $this->error('Se produjo una excepción ' . $e->getMessage());
        }
        return Command::SUCCESS;
    }
}
