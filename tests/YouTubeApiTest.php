<?php

declare(strict_types=1);

namespace Oliezekat\SmartYoutubeApiClient\Tests;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\Medium;
use PHPUnit\Framework\Attributes\Depends;

#[TestDox('YouTube API test')]
#[Medium]
final class YouTubeApiTest extends AbstractYouTubeServiceTestCase
{
    #[TestDox('Test listChannels API')]
    #[Depends('testGetYouTubeService')]
    public function testListChannels(): void
    {
        $channelId = 'UCoYHVgooIkCJJwLjrEQ4LQw'; // @YMobActus owned by @oliezekat
        $queryParams = [
            'id'                 => $channelId,
            'maxResults'         => 1,
        ];
        $response = $this->getYouTubeService()->channels->listChannels('snippet', $queryParams);
        $this->assertObjectHasProperty('items', $response, 'Response has "items" property');
        $this->assertIsArray($response->items, 'Is "items" an array');
        $this->assertEquals(count($response->items), 1, 'Has one item only');
    }
}
