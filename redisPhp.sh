echo extension=redis.so > /etc/php5/mods-available/redis.ini
ln -s /etc/php5/mods-available/redis.ini /etc/php5/apache2/conf.d/
ln -s /etc/php5/mods-available/redis.ini /etc/php5/cli/conf.d/
cp phpinfo.php /var/www/html/
cp index.html /var/www/html/
cp app.php /var/www/html/
cp controllers.js /var/www/html/


