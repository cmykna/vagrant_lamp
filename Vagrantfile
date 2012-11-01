# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant::Config.run do |config|
  # All Vagrant configuration is done here. The most common configuration
  # options are documented and commented below. For a complete reference,
  # please see the online documentation at vagrantup.com.

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "precise64"

  # The url from where the 'config.vm.box' box will be fetched if it
  # doesn't already exist on the user's system.
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  # Forward a port from the guest to the host, which allows for outside
  # computers to access the VM, whereas host only networking does not.
  config.vm.forward_port 80, 8080

  # config.vm.provision :puppet do |puppet|
  #   puppet.manifests_path = "puppet"
  #   puppet.manifest_file  = "precise64.pp"
  # end

  config.vm.provision :chef_solo do |chef|
    chef.json = {
        "mysql" => {
            "server_root_password" => "root"
        }
    }

    chef.cookbooks_path = "cookbooks"
    chef.add_recipe "apt"
    chef.add_recipe "build-essential"
    chef.add_recipe "mysql::server"
    chef.add_recipe "apache2"
    chef.add_recipe "php"
    chef.add_recipe "apache2::mod_php5"
    chef.add_recipe "php::module_mysql"
    chef.add_recipe "sqlite"
    chef.add_recipe "hmhed"
  end

  config.vm.customize ["modifyvm", :id, "--memory", "512"]
end
