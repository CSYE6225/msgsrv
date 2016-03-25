# msgsrv 
msgsrv is an application that enable the user to submit notes into a website. The service persist the notes in a Redis-based key-value store.
The web-site runs on PHP usign Apache as a web server. 
## install guide
sudo apt-get install apache2 unzip tcl php5 libapache2-mod-php5 make gcc git php5-dev

git config --global user.name "yahavb"

git config --global user.email "ybiran@colostate.edu"

git clone https://github.com/CSYE6225/msgsrv.git

### Install Redis
wget http://download.redis.io/redis-stable.tar.gz

tar xvzf redis-stable.tar.gz

cd redis-stable

make

####copy the redis executables into path 
sudo cp src/redis-server /usr/local/bin/

sudo cp src/redis-cli /usr/local/bin/

####start redis: redis-server
#####open a new command line window
test redis: redis-cli ping

should return PONG 

###Enabling PHP-Redis w/ apache2

#####make sure apache is up
sudo /etc/init.d/apache2 restart

cd /tmp

wget https://github.com/phpredis/phpredis/archive/master.zip -O phpredis.zip
unzip -o /tmp/phpredis.zip && mv /tmp/phpredis-* /tmp/phpredis && cd /tmp/phpredis && phpize && ./configure && make && sudo make install

execute redisPhp.sh




