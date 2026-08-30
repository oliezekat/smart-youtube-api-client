<?php

declare(strict_types=1);

namespace Oliezekat\SmartYoutubeApiClient\Tests;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\Depends;
use Google\Client                                as GoogleClient;
use Google\Service\YouTube                       as GoogleServiceYouTube;

trait GoogleServiceYouTubeTestTrait
{
    private ?GoogleServiceYouTube $youtubeService     = null;

    /**
     * @see GoogleClientTestTrait::getGoogleClient()
     */
    abstract protected function getGoogleClient(): GoogleClient;

    protected function getYouTubeService(): GoogleServiceYouTube
    {
        if ($this->youtubeService === null) {
            $googleClient = $this->getGoogleClient();
            $googleClient->setScopes(
                [
                GoogleServiceYouTube::YOUTUBE_READONLY,
                ]
            );
            $youtubeService = new GoogleServiceYouTube($this->getGoogleClient());
            $this->youtubeService = $youtubeService;
        }
        return $this->youtubeService;
    }

    #[TestDox('Create instance of Google\\Service\\YouTube')]
    #[Depends('testGetGoogleClient')]
    public function testGetYouTubeService(): void
    {
        $youtubeService = $this->getYouTubeService();
        $this->assertInstanceOf('Google\\Service\\YouTube', $youtubeService, 'Is instance of Google\\Service\\YouTube');
        $this->assertObjectHasProperty('channels', $youtubeService, 'YouTube service has "channels" property');
    }
}
