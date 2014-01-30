set :application, "monkeyphp.com"

set :scm, :git
set :repository,  "git@github.com/monkeyphp/monkeyphp.git"

set :user, "vagrant"
set :use_sudo, false

set :branch, Capistrano::CLI.ui.ask("Which branch would you like to deploy?")

set :keep_releases, 3

# before deploy cold
before "deploy:setup", "composer_install"

# after tasks

desc "Execute Capistrano tasks against the UAT Environment"
task :uat do
    role :web, "192.168.45.56"
    set :domain, "uat.monkeyphp.com"
    set :deploy_to, "/var/www/#{domain}"
end

desc "Execute Capistrano against the PRODUCTION Envvironment"
task :prod do
    role :web, "www.monkeyphp.com"
    set :domain, "www.monkeyphp.com"
    set :deploy_to, "/var/www/{#domain}"
end

# install composer
task :composer_install do
    run "cd #{deploy_to} && curl -sS https://getcomposer.org/installer | php"
end

# update composer
task :composer_update do
    run "cd #{release_path} && php #{deploy_to}/composer.phar self-update"
    run "cd #{release_path} && php #Pdeploy_to}/composer.phar install --no-dev --optimise-autoloader"
end