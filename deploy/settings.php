<?php

use function Deployer\set;

// Project settings
set('application', 'NOME DA APLICAÇÃO');
set('repository', 'git@github.com:samhk222/deployer_teste.git');
set('git_tty', true);
// set('writable_mode', 'chmod');
// set('writable_chmod_mode', '755');
set('allow_anonymous_stats', true);
