#!/bin/bash
#wp core download
#wp core config --dbprefix=vvh_ --dbuser=root --dbpass=root --dbname=wordpress
WORDPRESS=/var/www/html/wordpress
rm -rf $WORDPRESS/wp-content
tar zxf ~dev1/sync.tar.gz --strip 2 html/wordpress/wp-content  
mv ./wp-content $WORDPRESS
chown -R apache:apache $WORDPRESS/wp-content

wp db import ~dev1/sync.sql --path=$WORDPRESS
wp search-replace https://sync. https://sync-dev. --path=$WORDPRESS
#wp user create --path=$WORDPRESS admin loc@lad.min --role=administrator --user_pass=password
#wp user create --path=$WORDPRESS subscriber loc@lsubscri.ber --role=subscriber --user_pass=password
#wp core update --path=$WORDPRESS
wp core update-db --path=$WORDPRESS

