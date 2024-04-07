<?php

namespace Pages;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_the_home_page_returns_a_successful_response(): void
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_the_home_page_shows_profile(): void
    {
        $this->get('/')->assertSeeLivewire('profile');
    }

    public function test_the_home_page_shows_navbar(): void
    {
        $this->get('/')->assertSeeLivewire('navbar');
    }

    public function test_the_home_page_shows_posts(): void
    {
        $this->get('/')->assertSeeLivewire('posts');
    }
}
