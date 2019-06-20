<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', '');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);


// Hosts

host('project.com')
    ->set('deploy_path', '~/{{application}}');


// Tasks

desc('Deploy your project');
task('deploy', [
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
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');



namespace Deployer;

require 'recipe/common.php';

require 'deploy/settings.php';
require 'deploy/hosts.php';

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
    // 'cleanup', # Nâo tenho permissão de root
    // 'settings_folders_permissions',
    'show_ssh_info',
    'success'
]);


desc("Conecte ao server, e execute o comando");
task('show_ssh_info', function () {
    writeln('ssh samu@samuca.com');
});

desc("Setando as permissões do diretório");
task('settings_folders_permissions', function () {
    $command = "chmod -R 755 {{deploy_path}}";
    $command2 = "run('ln -srfn releases/{{release_name}} current');";
    writeln($command2);
    run($command2);
});

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
