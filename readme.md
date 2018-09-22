<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
Example code repository for tutorial on how to transcode video using FFmpeg in Laravel using queues. 

### Setup Instructions
```
$ git clone https://github.com/waleedahmad/laravel-stream.git
$ composer install
$ php artisan preset bootstrap
$ npm install && npm run dev

# update database credentials, queue connection driver and FFmpeg binaries
# if you're running app on Windows.
$ nano .env

DB_DATABASE=laravel_stream
DB_USERNAME=username
DB_PASSWORD=password

QUEUE_CONNECTION=database

FFMPEG_BINARIES=''
FFPROBE_BINARIES=''
```

#### Running queue worker
```
$ php artisan queue:work --tries=3 --timeout=8600
```