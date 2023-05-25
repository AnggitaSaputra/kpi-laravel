<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class migrateTeam2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate_team_2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migrate database from team 2 with its order';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $migrations = [
            '2023_04_08_125322_create_jabatan_table.php',
            '2023_04_08_133848_create_departemen_table.php',
            '2023_04_08_141434_create_perusahaan_table.php',
        ];

        foreach($migrations as $migration)
        {
           $basePath = 'database/migrations/';          
           $migrationName = trim($migration);
           $path = $basePath.$migrationName;
           $this->call('migrate:refresh', [
            '--path' => $path ,            
           ]);
        }
        return Command::SUCCESS;
    }
}
