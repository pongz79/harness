<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 10/04/17
 * Time: 21:54
 */

namespace Tests\Feature;


use App\Media;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MediaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_view_a_list_of_media()
    {
        // Create a media record
        Media::create([
            'release_date' => '2017-04-21 10:21:54',
            'keywords'     => 'blah,test',
            'description'  => 'some description',
            'certificate'  => 'PG-13',
            'filename'     => 'test.png'
        ]);

        // Get the records
        $response = $this->get('/media');

        // Assert the response code
        $response->assertStatus(200);

        // Assert the json
        $response->assertJsonFragment([
            'release_date' => '2017-04-21 10:21:54',
            'keywords'     => 'blah,test',
            'description'  => 'some description',
            'certificate'  => 'PG-13',
            'filename'     => 'test.png'
        ]);
    }

    /** @test */
    public function user_can_create_a_media_record()
    {
        // Create a media record
        $response = $this->post('/media', [
            'release_date' => '2017-04-21 10:21:54',
            'keywords'     => 'blah,test',
            'description'  => 'some description',
            'certificate'  => 'PG-13',
            'filename'     => 'test.png'
        ]);

        // Assert the response code
        $response->assertStatus(201);

        // Assert the json
        $response->assertJsonFragment([
            'release_date' => '2017-04-21 10:21:54',
            'keywords'     => 'blah,test',
            'description'  => 'some description',
            'certificate'  => 'PG-13',
            'filename'     => 'test.png'
        ]);
    }

    /** @test */
    public function user_can_update_a_media_record()
    {
        // Create a media record
        $media = Media::create([
            'release_date' => '2017-04-21 10:21:54',
            'keywords'     => 'blah,test',
            'description'  => 'some description',
            'certificate'  => 'PG-13',
            'filename'     => 'test.png'
        ]);

        // Update the record
        $response = $this->patch('/media', [
            'id'          => $media->id,
            'description' => 'updated description',
            'certificate' => 'PG'
        ]);

        // Assert the response code
        $response->assertStatus(200);

        // Assert the json
        $response->assertJsonFragment([
            'description' => 'updated description',
            'certificate' => 'PG'
        ]);
    }

    /** @test */
    public function user_can_delete_a_media_record()
    {
        // Create a media record
        $media = Media::create([
            'release_date' => '2017-04-21 10:21:54',
            'keywords'     => 'blah,test',
            'description'  => 'some description',
            'certificate'  => 'PG-13',
            'filename'     => 'test.png'
        ]);

        // Delete the record
        $response = $this->delete('/media', [
            'id' => $media->id
        ]);

        // Assert the response code
        $response->assertStatus(200);
    }
}