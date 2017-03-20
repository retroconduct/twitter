# twitter-app
Please install the prerequisites to support a Laravel 5.4 and set proper permissions for folders

## Usage

### Create a virtual host at /etc/hosts

127.0.1.1	twitter.dev.com

### Create a server block in your nginx/sites-available

server {
    listen 80;
    root /projects/twitter/public;
    index index.php index.html;
    server_name twitter.dev.com;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
    }
}

### Run composer.phar install to install all the dependencies

### Create Twitter Dev Account and Generate your keys and then add them to your .env file

	TWITTER_CONSUMER_KEY = YOUR_KEY
	TWITTER_CONSUMER_SECRET = YOUR_SECRET
	TWITTER_ACCESS_TOKEN = 	YOUR_TOKEN
	TWITTER_ACCESS_TOKEN_SECRET = YOUR_TOKEN_SECRET

### Access your virtual host and enjoy!