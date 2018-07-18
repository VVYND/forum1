<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipanteInForumTest extends TestCase
{

    use DatabaseMigrations;

    function user_can_participate(){

        $this->be($user= factory('App\User')->create());

        $thread=factory('App\Thread')->create();

        $reply=factory('App\Reply')->make();
        $this->post($thread->path(), '/replies', $reply->toArray());

        $this->get($thread->path())
        ->assertSee($reply->body);
    }
}
