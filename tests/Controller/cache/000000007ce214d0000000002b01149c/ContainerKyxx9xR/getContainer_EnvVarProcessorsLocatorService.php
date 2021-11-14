<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'container.env_var_processors_locator' shared service.

return $this->services['container.env_var_processors_locator'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'base64' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'bool' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'const' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'csv' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'default' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'file' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'float' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'int' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'json' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'key' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'query_string' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'require' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'resolve' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'string' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'trim' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
    'url' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService.php', true],
], [
    'base64' => '?',
    'bool' => '?',
    'const' => '?',
    'csv' => '?',
    'default' => '?',
    'file' => '?',
    'float' => '?',
    'int' => '?',
    'json' => '?',
    'key' => '?',
    'query_string' => '?',
    'require' => '?',
    'resolve' => '?',
    'string' => '?',
    'trim' => '?',
    'url' => '?',
]);