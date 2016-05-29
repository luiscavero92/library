#LOCAL
#sudo apt-get install rubygems-integration build-essential
#gem install capifony
#gem install capistrano_rsync_with_remote_cache
#cap production deploy:setup
#(cap env deploy:check)
#En el caso de que el server no permita los acl, comprobar los parámetros referentes a los servidores de despliegue de los ficheros: parameters.yml.dist,
#deploy.rb, composer.json (nuestros repos de gitlab, en el caso de que existan) y las fixtures pertinentes.

#REMOTE
#ssh your_deploy_server
#mkdir -p /var/www/my-app.com/released
#mkdir -p /var/www/my-app.com/shared/app/config
#vim /var/www/my-app.com/shared/app/config/parameters.yml
## Si hacemos deploy con ACL
# $ HTTPDUSER=`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
# $ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX /var/www/my-app.com/
# $ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX /var/www/my-app.com/
## Si hacemos deploy con SUDO y CHOWN:
# sudo chown USUARIOSERVIDOR:www-data -R shared && sudo chown USUARIOSERVIDOR:www-data -R released

load 'deploy' if respond_to?(:namespace) # cap2 differentiator

require 'capifony_symfony2'
load 'app/config/deploy'
