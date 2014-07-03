#!/bin/bash
WP_DIR=/home/dev1/git/vvh/first/wordpress
#WP_DIR=/data/vvh_internet/current/public
TARGET_DIR=$WP_DIR/wp-content

# set working directory (psx360 source directory)
if  [[ -z $WD ]]
then
  WD=.
fi

WP_CLI=wp

WP_SITE_URL=$($WP_CLI --path=$WP_DIR option get siteurl)

#echo 'Replacing theme'
#rm -r $TARGET_DIR/themes/haulin
#cp -r $WD/php/themes/* $TARGET_DIR/themes/
#$WP_CLI theme activate haulin --path=/var/www/wordpress --url=$WP_SITE_URL/haulin

#echo 'Emptying site'
#$WP_CLI --path=/var/www/wordpress site empty --path=/var/www/wordpress --url=$WP_SITE_URL/#haulin --yes

echo 'Importing content'
$WP_CLI import $WD/wordpress_content/vvh/site-content.xml --authors=skip --skip=attachment --quiet --path=$WP_DIR --url=$WP_SITE_URL/CIRI

#echo 'Importing widgets'
#$WP_CLI --require=$WD/php/wp-cli/Front_Page_Command.php static-front-page 'Haulin Home' --#path=/var/www/wordpress --url=$WP_SITE_URL/haulin

#$WP_CLI --require=$WD/php/wp-cli/Widgets_Command.php widgets import $WD/wordpress_content/#haulin/widgets.json --quiet --path=/var/www/wordpress --url=$WP_SITE_URL/haulin

#$WP_CLI --path=/var/www/wordpress option update require_terms_and_conditions '1' --url=#$WP_SITE_URL/haulin

#echo 'Importing Admin Dashboard Customizations'
#$WP_CLI --require=$WD/php/wp-cli/Import_Custom_Admin_Settings.php dashboard import $WD/#wordpress_content/haulin/wlcms-settings.txt --quiet --url=$WP_SITE_URL/haulin --path=/var/#www/wordpress
