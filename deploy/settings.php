<?php

use function Deployer\set;

// Project settings
set('application', 'donannajuliaTESTE');
set('repository', 'git@github.com:samhk222/deployer_teste.git');
set('git_tty', true);
set('writable_mode', 'chmod');
set('writable_chmod_mode', '0755');
set('allow_anonymous_stats', true);
// find dontest10 -type d -exec chmod 755 {} +
