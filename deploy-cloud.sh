// Being executed from the home directory: /home/dev1

// Copy the word press cli command file over to the box.
sudo scp  -i ./.ssh/vvh_internet /usr/local/wp-cli/wp-cli.phar root@54.88.178.236:/usr/local/bin

// Copy the word press files
--sudo scp  -i ./.ssh/vvh_internet /home/dev1/git/vvh/wordpress/*.* root@54.88.178.236:/data/vvh_internet/current/public

mysql -u root

create database wordpress;

grant usage on *.* to deploy@localhost identified by 'deploy';

 grant all privileges on wordpress.* to deploy@localhost ;


 user: admin/admin