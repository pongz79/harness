<?php

namespace Tests\Unit;

use App\Media;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MediaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function converting_to_an_array()
    {
        $media = Media::create([
            'release_date' => '2017-04-21 10:21:54',
            'keywords' => 'blah,test',
            'description' => 'some description',
            'certificate' => 'PG-13',
            'filename' => 'test.png'
        ]);

        $result = $media->toArray();

        $this->assertEquals([
            'release_date' => '2017-04-21 10:21:54',
            'keywords' => 'blah,test',
            'description' => 'some description',
            'certificate' => 'PG-13',
            'filename' => 'test.png'
        ], $result);
    }
}
