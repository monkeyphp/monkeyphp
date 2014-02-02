#
# Cookbook Name:: monkeyphp
# Recipe:: default
#
# Copyright 2013, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#

include_recipe "php"
include_recipe "php::module_mysql"
include_recipe "apache2"
include_recipe "apache2::mod_php5"
include_recipe "varnish::apt_repo"
include_recipe "varnish"
include_recipe "redisio"
include_recipe "redisio::install"
include_recipe "redisio::enable"
include_recipe "mysql::server"
include_recipe "mysql::client"
include_recipe "database::mysql"

package "php5-intl" do
  action :install
end

package "php5-curl" do
  action :install
end

package "php-apc" do
  action :install
end

package "memcached" do
  action :install
end

package "php5-memcached" do
  action :install
end

mysql_database node['monkeyphp']['database'] do
    connection ({
        :host     => 'localhost',
        :username => 'root',
        :password => node['mysql']['server_root_password']
    })
    action :create
end

mysql_database_user node['monkeyphp']['db_username'] do
  connection ({
        :host     => 'localhost',
        :username => 'root',
        :password => node['mysql']['server_root_password']
    })
    password node['monkeyphp']['db_password']
    database_name node['monkeyphp']['database']
    privileges [:select,:update,:insert,:create,:delete]
    action :grant
end

web_app "application" do
    server_name node['monkeyphp']['server_name']
    docroot     node['monkeyphp']['docroot']
    server_port node['monkeyphp']['server_port']
end

tt = resources('template[/etc/varnish/default.vcl]')
tt.source 'default.vcl.erb'
tt.cookbook 'monkeyphp'



### Iptables

template "/etc/iptables.rules" do
    source "iptables.rules.erb"
    owner "root"
    group "root"
    mode 0700
end

template "/etc/network/if-up.d/iptablesload" do
    source "iptablesload.erb"
    owner "root"
    group "root"
    mode 0755
end

template "/etc/network/if-post-down.d/iptablessave" do
    source "iptablessave.erb"
    owner "root"
    group "root"
    mode 0755
    notifies :run, 'execute[iptablesload]', :delayed
end

execute "iptablesload" do
    command "./etc/network/if-up.d/iptablesload"
end
