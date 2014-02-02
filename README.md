# Monkeyphp

### Download the repository from Github

    $ git clone https://githun.com/monkeyphp/monkyphp.git $HOME/Sites/development.monkeyphp.com

### Install Bundler

    $ cd $HOME/Sites/development.monkeyphp.com
    $ gem install bundler

### Install the required Ruby Gems

    $ cd $HOME/Sites/development.monkeyphp.com
    $ bundle install --binstubs

### Install the Cookbooks

    $ cd $HOME/Sites/development.monkeyphp.com/tools/chef
    $ bundle exec librarian-chef install

### Update local hosts file

    $ echo '192.168.45.46 development.monkeyphp.com' | sudo tee -a /etc/hosts

### Start the Virtual Machine

    $ cd $HOME/Sites/development.monkeyphp.com/tools/vagrant
    $ vagrant up

### Provision a remote machine using Knife

    $ cd $HOME/Sites/development.monkeyphp.com/tools/chef
    $ bundle exec knife solo prepare vagrant@192.168.45.46
    $ bundle exec knife solo cook vagrant@192.168.45.46 nodes/192.168.45.46.json

### Capistrano Deploy to UAT

    $ cd $HOME/Sites/uat.monkeyphp.com/tools/capistrano
    $ bundle exec cap uat deploy:setup

### Varnish

- https://www.varnish-software.com/static/book/Introduction.html

#### Varnish Logs

    $ varnishlog

Only show traffic to web server

    $ varnishlog -b

#### Purge Varnish cache of all objects

    $ sudo varnishadm
    $ ban.url .

### Iptables

- https://help.ubuntu.com/community/IptablesHowTo

### List the current rules

    $ sudo iptables -L
    $ sudo iptables -A INPUT -m conntrack --ctstate ESTABLISHED,RELATED -j ACCEPT
    $ sudo iptables -A INPUT -p tcp --dport 22 -j ACCEPT
    $ sudo iptables -I INPUT 3 -p tcp --dport 80 -j ACCEPT
    $ sudo iptables -I INPUT 1 -i lo -j ACCEPT
    $ sudo iptables -A INPUT -j DROP

Save the Iptables rule

    $ sudo sh -c "iptables-save > /etc/iptables.rules"


