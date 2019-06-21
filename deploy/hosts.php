<?php

use function Deployer\host;

$folder = '/home/samu/public_html/my_test17';

host('production')
    ->hostname("samuca.com")
    ->set('branch', 'master')
    ->set('cleanup_use_sudo', true)
    ->user('samu')
    ->port(22)
    ->identityFile(dirname(__DIR__) . '/deploy/id_rsa')
    ->set('deploy_path', $folder);

host('develop')
    ->hostname("samuca.com")
    ->set('branch', 'develop')
    // ->set('cleanup_use_sudo', false)
    ->user('samu')
    ->port(22)
    ->identityFile(dirname(__DIR__) . '/deploy/id_rsa')
    ->set('deploy_path', $folder);
