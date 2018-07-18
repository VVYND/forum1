<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp(){

        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }

    function thread_has_reply(){

        

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection' ,$this->thread->replies);
    }

    function thread_has_creator(){

        $thread = factory('App\Thread')->create();

        $this->assertInstanceOf('App\User',$this->thread->creator);
    }

    function thread_can_add_reply(){

        $this->thread->addReply([
            'body' => 'Foobar',
            'user_id' => 1
        ]);

        $this->assertCount(1,$this->thread->replies);
    }
}
