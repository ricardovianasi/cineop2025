<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'cineop2024');

// Project repository
set('repository', 'git@github.com:ricardovianasi/cineop2024.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);
set('ssh_type', 'native');
set('ssh_multiplexing', true);

// Shared files/dirs between deploys
set('shared_dirs', ['wp-content/uploads', 'wp-content/ewww', 'wp-content/cache', 'wp-content/w3tc-config']);
set('writable_dirs', ['wp-content/uploads', 'wp-content/ewww', 'wp-content/cache', 'wp-content/w3tc-config']);

set('http_user', 'www-data');
set('writable_chmod_mode', '0755');
set('writable_mode', 'chown');

// Assets Dir
set('assets_dir', 'wp-content/themes/up/assets');
set('rsync_src', __DIR__ . '/wp-content/themes/up/assets/dist');
set('rsync_dest', '{{release_path}}/wp-content/themes/up/assets/');

set('prod_files', ['wp-config.php.prod', '.htaccess.prod']);

// Hosts
host('1')
  ->hostname('159.65.191.102')
  ->user('root')
  ->identityFile('~/.ssh/id_rsa')
  ->multiplexing(true)
  ->forwardAgent()
  ->set('deploy_path', '/var/www/html/{{application}}');

//Task to change shared filenames.
task('up:profiles', function() {
  
  foreach (get('prod_files') as $file) {
    if(strpos($file, '.prod')) {
      // Rename
      run("mv {{release_path}}/$file {{release_path}}/" . str_replace('.prod', '', $file));
    }
  }
});

task('up:compile_assets', function() {
  $assetsDir = __DIR__ . '/' . trim(get('assets_dir'), '/');
  
  // Check if shared dir does not exist.
  if (!testLocally("[ -d $assetsDir ]")) {
    throw new Exception("Assets dir '$assetsDir' doesn't exist.");
  }
  
  runLocally("cd $assetsDir && npm rum build");
  runLocally("cd " . __DIR__);
});

task('up:rsync', function() {
  upload(get('rsync_src'), get('rsync_dest'));
});

// Tasks
desc('Deploy your project');
task('deploy', [
  'deploy:info',
  'deploy:prepare',
  'deploy:lock',
  'deploy:release',
  'deploy:update_code',
  'deploy:shared',
  'up:profiles',
  'deploy:writable',
  'deploy:clear_paths',
//  'up:compile_assets',
//  'up:rsync',
  'deploy:symlink',
  'deploy:unlock',
  'cleanup',
  'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
