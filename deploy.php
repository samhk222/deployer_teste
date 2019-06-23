<?php
namespace Deployer;

require 'recipe/common.php';

require 'deploy/settings.php';
require 'deploy/hosts.php';

require 'recipe/phinx.php';



task('test', function () {
    writeln('Hello world');
});

task('showFolder', function () {
    writeln("Deployando para {{deploy_path}}");
});

// set('env', [
//     'VARIABLE' => 'value',
// ]);

task('disk_free', function () {
    $df = run('df -h /');
    writeln($df);
});

desc('Deploy your project');
task('deploy', [
    'showFolder',
    'disk_free',
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup', # Nâo tenho permissão de root
    'show_ssh_info',
    'success'
]);


desc("Conecte ao server, e execute o comando");
task('show_ssh_info', function () {
    writeln('ssh samu@samuca.com');
});

desc("Setando as permissões do diretório");
task('fix-rights', function () {
    writeln("Fix Rights");

    $folders = 'find {{deploy_path}}/. -type d -print0 | xargs -0 chmod 755';
    writeln("Command: {$folders}");
    run($folders);

    $files = 'find {{deploy_path}}/. -type f -print0 | xargs -0 chmod 644';
    writeln("Command: {$files}");
    run($files);
});

after('cleanup', 'fix-rights');
after('rollback', 'fix-rights');
after('cleanup', 'phinx:migrate');

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
