<?php

return [
    'backup' => [
        'name' => env('APP_NAME', 'tutweb-backup'),
        'source' => [
            'files' => [
                'include' => [
                    base_path(),
                ],
                'exclude' => [
                    base_path('vendor'),
                    base_path('node_modules'),
                    storage_path('app/backup-temp'),
                ],
            ],
            'databases' => [
                'mysql',
            ],
        ],
        'destination' => [
            'filename_prefix' => 'backup-',
            'disks' => [
                'local',
            ],
        ],
        'temporary_directory' => storage_path('app/backup-temp'),
    ],

    'notifications' => [
        'notifications' => [
            \Spatie\Backup\Notifications\Notifications\BackupHasFailedNotification::class => ['telegram'],
            \Spatie\Backup\Notifications\Notifications\UnhealthyBackupWasFoundNotification::class => ['telegram'],
            \Spatie\Backup\Notifications\Notifications\CleanupHasFailedNotification::class => ['telegram'],
            \Spatie\Backup\Notifications\Notifications\BackupWasSuccessfulNotification::class => ['telegram'],
            \Spatie\Backup\Notifications\Notifications\HealthyBackupWasFoundNotification::class => ['telegram'],
            \Spatie\Backup\Notifications\Notifications\CleanupWasSuccessfulNotification::class => ['telegram'],
        ],

        'notifiable' => \Spatie\Backup\Notifications\Notifiable::class,
    ],

    'monitor_backups' => [
        [
            'name' => env('APP_NAME', 'tutweb-backup'),
            'disks' => ['local'],
            'health_checks' => [
                \Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumAgeInDays::class => 1,
                \Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumStorageInMegabytes::class => 5000,
            ],
        ],
    ],

    'cleanup' => [
        'strategy' => \Spatie\Backup\Tasks\Cleanup\Strategies\DefaultStrategy::class,
        'default_strategy' => [
            'keep_all_backups_for_days' => 7,
            'keep_daily_backups_for_days' => 16,
            'keep_weekly_backups_for_weeks' => 8,
            'keep_monthly_backups_for_months' => 4,
            'keep_yearly_backups_for_years' => 2,
            'delete_oldest_backups_when_using_more_megabytes_than' => 5000,
        ],
    ],
];
