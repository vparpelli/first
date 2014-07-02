#!/bin/bash

GITROOT="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
SRC=$GITROOT/wordpress/wp-content
THEME=bp-sync

WORDPRESS=/var/www/html/wordpress
WP_CONTENT=$WORDPRESS/wp-content

echo 'Backup widgets'
wp --require=$GITROOT/wp-cli-widgets.php widgets export-file ./syncwidgets.json --quiet --path=$WORDPRESS

echo 'Deactivating plugins'
for i in `ls -d $WP_CONTENT/plugins/*/`; do 
  wp plugin deactivate `basename $i` --path=$WORDPRESS;
done

echo 'Replacing plugins'
rm -rf $WP_CONTENT/plugins
cp -rf $SRC/plugins $WP_CONTENT

for i in `ls -d $WP_CONTENT/plugins/*/`; do
  wp plugin activate `basename $i` --path=$WORDPRESS;
done

echo 'Replacing theme'
rm -r $WP_CONTENT/themes/$THEME
cp -r $SRC/themes/$THEME $WP_CONTENT/themes/

wp theme activate $THEME --path=$WORDPRESS;

echo 'Restore widgets'
wp --require=$GITROOT/wp-cli-widgets.php widgets import ./syncwidgets.json --quiet --path=$WORDPRESS
rm ./syncwidgets.json

wp core update-db --path=$WORDPRESS

chown -R apache:apache $WP_CONTENT 
