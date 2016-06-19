    set :application,           "Streye App-Glass API"
    set :app_path,              "app"
    set :var_path,              "var"
    set :model_manager,         "doctrine"

    set :shared_files,          ["app/config/parameters.yml"]
    set :shared_children,       [var_path + "/logs", "vendor"]

    set :use_composer,          true
    set :update_vendors,        true
    set :composer_options,      "--dev --verbose --prefer-dist --optimize-autoloader --no-progress"

    set :repository,            "git@gitlab.droiders.com:streye-team/AppGlass_Backend.git"
    set :scm,                   :git
    set :deploy_via,            :rsync_with_remote_cache

    set :stages,                    %w(production development testing)
    set :default_stage,             "testing"
    set :stage_dir,                 "app/config/deploy"
    require 'capistrano/ext/multistage'

    set :group, "www-data"

    set :writable_dirs,         [var_path + "/cache", var_path + "/logs"]
    set :webserver_user,        "www-data"
    set :permission_method,     :acl
    set :use_set_permissions,   true

    set  :use_sudo,             false

    set :cache_path,            var_path + "/cache"
    set :symfony_console,       "bin/console"
    set :logs_path,             var_path + "/logs"
    default_run_options[:pty] = true

    logger.level = Logger::MAX_LEVEL

    namespace :deploy do
     desc "Migrate all connections"
      task :migrateall do
       run("cd #{deploy_to}/current && php bin/console doctrine:migrations:migrate --env=prod  --no-interaction")
       run("cd #{deploy_to}/current && php bin/console doctrine:migrations:migrate --env=test  --no-interaction")
      end
    end

    after 'deploy:restart', 'deploy:migrateall'
