set :domain,                "app-dev.streye.com"
set :deploy_to,             "/var/www/appglass/backend"
set :user,                  "ubuntu"

role :web,                  domain                         # Your HTTP server, Apache/etc
role :app,                  domain, :primary => true       # This may be the same as your `Web` server

set :branch,                "develop"

set  :keep_releases,        2
