<?php

use App\Comment;

class CommentsApiTest extends \Tests\TestCase
{
    public function setUp()
    {
        parent::setUp();
        \Illuminate\Support\Facades\Artisan::call('migrate');
    }

    public function testGetComments()
    {
        $post = factory(\App\PostComment::class)->create();
        $comment = factory(Comment::class)->create(['commentable_type' => 'PostComment', 'commentable_id' => $post->id]);
        $comment2 = factory(Comment::class)->create(['commentable_type' => 'PostComment', 'commentable_id' => $post->id]);
        $comment3 = factory(Comment::class)->create(['commentable_type' => 'PostComment', 'commentable_id' => $post->id]);
        $response = $this->call('GET', '/comments', ['type' => 'PostComment', 'id' => $post->id]);
        $comments = json_decode($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(3, count($comments));
        $this->assertSame(0, $comments[0]->reply);
    }
}