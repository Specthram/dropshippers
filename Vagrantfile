# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "debian/jessie64"
  config.vm.box_version = "8.5.2"
  config.vm.network "private_network", ip: "192.168.51.51"

  config.vm.synced_folder ".", "/vagrant", type: "sshfs"
#  config.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "www-data"
#  config.vm.synced_folder ".", "/vagrant", type: "nfs"

  config.vm.provider "virtualbox" do |vb|
    vb.gui = false
    vb.memory = "2048"
    vb.cpus = 4
  end

  config.vm.provision :ansible_local do |ansible|
    ansible.playbook = "ansible/vagrant.yml"
  end
end
