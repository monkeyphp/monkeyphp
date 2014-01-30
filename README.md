# Monkeyphp

### Download the repository from Github

    $ git clone https://githun.com/monkeyphp/monkyphp.git $HOME/Sites/monkeyphp.com.local

### Install Bundler

    $ cd $HOME/Sites/monkeyphp.com.local
    $ gem install bundler

### Install the required Ruby Gems

    $ cd $HOME/Sites/monkeyphp.com.local
    $ bundle install --binstubs

### Install the Cookbooks

    $ cd $HOME/Sites/monkeyphp.com.local/tools/chef
    $ bundle exec librarian-chef install

### Update local hosts file

    $ echo '192.168.45.46 monkeyphp.com.local' | sudo tee -a /etc/hosts

### Start the Virtual Machine

    $ cd $HOME/Sites/monkeyphp.com.local/tools/vagrant
    $ vagrant up

### Provision a remote machine using Knife

    $ cd $HOME/Sites/monkeyphp.com.local/tools/chef
    $ bundle exec knife solo prepare vagrant@192.168.45.46
    $ bundle exec knife solo cook vagrant@192.168.45.46 site-roles/web.json

