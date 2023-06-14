## before running the app you need to do the following.

- Set the CACHE_DRIVER, CACHE_DRIVER=redis
- Add REDIS_CLIENT=predis
- If you don't have Redis PHP extension you should install it.
- After setting the above run redis with `redis-server`
- Composer install.
- have fun.

## Running the App

The app uses Saloon api library and curl for api calls and it levergs both libs to make the calls. 

- `app_url/saloon/next` this end point gets the matches that will start in next fifteen minuets using Saloon.
- `app_url/saloon/current` this end point gets the matches that are being played now using Saloon.
- `app_url/curl/next` this end point gets the matches that will start in next fifteen minuets using Curl.
- `app_url/curl/current` this end point gets the matches that are being played now using Curl.
