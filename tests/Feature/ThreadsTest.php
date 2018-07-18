<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    // protected $thread;

    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }

    public function user_can_view(){

        $this->get('/threads')
        ->assertSee($this->thread->title);
    }

    public function user_can_read(){

        $this->get($this->thread->path())
        ->assertSee($this->thread->title);
    }

    public function user_can_read_reply(){

        $reply = factory('App\Reply')
        ->create(['thread_id'=>$this->thread->id]);

        $this -> get ($this->thread->path())
        ->assertSee($reply->body);
    }
    
    // public function t()
    // {
    //     $thread = factory ('App\Thread')->create();
    //     $response = $this->get('/threads');

    //     $response = $this->get('/threads/' . $thread->id);
    //     $response->assertSee($thread->title);
    // }

    // public function thread_has_creator(){

    //     $thread = factory ('App\Thread')->create();
    //     $this->assertInstanceOf('App\User',$thread->creator);
    // }
}
