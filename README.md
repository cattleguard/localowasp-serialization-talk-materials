# Materials for Local Appsec Talk Covering Serialization Basics via PHP Object Injection
These artifacts install and setup purposefully vulnerable code for demonstration purposes.  Never install any of this repo's code outside of a lab setting.

# Ansible Playbooks - /playbooks/
`playbook.yml` installs python on a clean Ubuntu server.
`playbook2.yml` sets up php (and adds apt repo ppa:ondrej/php), nginx, copies over test.php, and creates an uploads folder.

command line running `ansible-playbook playbook.yml --ask-become-pass`

# Metasploit Module - /modules/
Demo msf module for the contrived example.  This goes inside of your `.msf4` user folder.

# test.php - /vulnerable php/
Vulnerable target

# YouTube Dry Run
https://youtu.be/_30--DXwfQM