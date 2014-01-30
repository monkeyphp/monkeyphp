CURRENT_CHEF_VERSION=$(chef-solo --version | tr -dc '[0-9].')

if [[ $CURRENT_CHEF_VERSION < 11.6.0 ]]; then
    echo "Installed version of Chef is out of date. Upgrading Chef..."

    rm -Rf /etc/chef
    rm -Rf /var/log/chef

    wget -q -O install-chef.sh http://www.getchef.com/chef/install.sh
    chmod +x install-chef.sh
    ./install-chef.sh
else
    echo "Installed version of Chef OK!"
fi