sudo sed -i "s/PasswordAuthentication no/PasswordAuthentication yes/g" /etc/ssh/sshd_config
sudo systemctl restart sshd

sudo python3 -m pip install pip --upgrade

# add ansible user
sudo useradd ansible
echo -e 'ansible\nansible' | sudo passwd ansible
echo 'ansible ALL=(ALL) NOPASSWD: ALL' | sudo tee /etc/sudoers.d/ansible