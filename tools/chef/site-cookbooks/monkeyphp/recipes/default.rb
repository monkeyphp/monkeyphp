#
# Cookbook Name:: monkeyphp
# Recipe:: default
#
# Copyright 2013, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#

include_recipe "apache2"

include_recipe "php"
include_recipe "apache2::mod_php5"
include_recipe "varnish::apt_repo"
include_recipe "varnish"
include_recipe "java"
include_recipe "elasticsearch"
include_recipe "redisio"
include_recipe "redisio::install"
include_recipe "redisio::enable"

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

web_app "application" do
    server_name node['monkeyphp']['server_name']
    docroot node['monkeyphp']['docroot']
end

tt = resources('template[/etc/varnish/default.vcl]')
tt.source 'default.vcl.erb'
tt.cookbook 'monkeyphp'
