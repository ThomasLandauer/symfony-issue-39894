<?php declare(strict_types=1);

use App\Service\MonologDatabaseHandler;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension('monolog', [
        'channels' => ['app'],
        'handlers' => [
            'database' => [
                'channels' => ['app'],
                'level' => 'info',
                'type' => 'service',
                'id' => MonologDatabaseHandler::class
            ]
        ]
    ]);
};
