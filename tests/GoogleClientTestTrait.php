<?php

declare(strict_types=1);

namespace Oliezekat\SmartYoutubeApiClient\Tests;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\Depends;
use Google\Client                                as GoogleClient;

trait GoogleClientTestTrait
{
    private ?GoogleClient $googleClient               = null;

    /**
     * @see GoogleApiKeyTestTrait::getGoogleApiKey()
     */
    abstract protected function getGoogleApiKey(): string;

    protected function getGoogleClient(): GoogleClient
    {
        if ($this->googleClient === null) {
            $googleClient = new GoogleClient();
            $googleClient->setApplicationName('PHPUnit/10.5 (' . __NAMESPACE__ . ')');
            $googleClient->setDeveloperKey($this->getGoogleApiKey());
            $this->googleClient = $googleClient;
        }
        return $this->googleClient;
    }

    #[TestDox('Create instance of Google\\Client')]
    #[Depends('testGetGoogleApiKey')]
    public function testGetGoogleClient(): void
    {
        $googleClient = $this->getGoogleClient();
        $this->assertInstanceOf('Google\\Client', $googleClient, 'Is instance of Google\\Client');
    }
}
