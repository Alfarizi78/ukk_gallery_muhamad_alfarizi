<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BackupGallery extends Command
{
    protected $signature = 'gallery:backup';
    protected $description = 'Backup gallery images and database';

    public function handle()
    {
        // Backup images
        $this->backupImages();
        
        // Backup database
        $this->backupDatabase();
        
        $this->info('Gallery backup completed successfully!');
    }

    private function backupImages()
    {
        $date = Carbon::now()->format('Y-m-d');
        
        // Backup posts images
        Storage::disk('backup')->makeDirectory("posts/{$date}");
        Storage::disk('public')->copy('posts', "backup/posts/{$date}");
        
        // Backup albums images
        Storage::disk('backup')->makeDirectory("albums/{$date}");
        Storage::disk('public')->copy('albums', "backup/albums/{$date}");
    }

    private function backupDatabase()
    {
        $date = Carbon::now()->format('Y-m-d');
        $filename = "backup-{$date}.sql";
        
        $command = sprintf(
            'mysqldump -u%s -p%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.database'),
            storage_path("app/backup/{$filename}")
        );
        
        exec($command);
    }
} 