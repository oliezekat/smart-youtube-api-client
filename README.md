# Smart YouTube API client

Save your time, bandwidth, storage, money... and Earth's climate too !

## Featured

Copy cleaned of Google packages as **standalone API client for YouTube service only**.

**IMPORTANT:** 

Don't install this package if you need anothers services from google/apiclient-services.

## Installation

### Remove Google's packages

```bash
composer remove google/apiclient
composer remove google/apiclient-services
```

### Remove Google\Task\Composer::cleanup from your composer.json

```json
{
    ...
    "scripts": {
        "pre-autoload-dump": "Google\\Task\\Composer::cleanup"
    },
    "extra": {
        "google/apiclient-services": [
            "YouTube"
        ]
    },
    ...
}
```

### Require this package only

```bash
composer require oliezekat/smart-youtube-api-client
```

### PHPUnit requirements

Defines 'GOOGLE_API_KEY' environment variable with API key from [Google Developer Console's](https://console.developers.google.com/).

## Resources

 * [Smart YouTube API client](https://github.com/oliezekat/smart-youtube-api-client) repository on *GitHub*
 * [google/apiclient](https://github.com/googleapis/google-api-php-client) repository on *GitHub*
 * [google/apiclient-services](https://github.com/googleapis/google-api-php-client-services) repository on *GitHub*
 * [Issue "This packaging strategy is hell !"](https://github.com/googleapis/google-api-php-client-services/issues/9230) on *google/apiclient-services* repository
