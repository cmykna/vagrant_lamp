# Cookbook Name:: hmhed
# Recipe:: default

require 'fileutils'

ruby_block "symlink-hmhed" do
	block do
		FileUtils.rm_rf "/var/www" if File.exists? "/var/www"
		FileUtils.symlink "/vagrant/www", "/var/www"
	end
	action :create
end

package "vim" do
	action :upgrade
end

package "phpmyadmin" do
	action :upgrade
end

package "php5-mcrypt" do
	action :upgrade
end

package "php5-sqlite" do
	action :upgrade
end