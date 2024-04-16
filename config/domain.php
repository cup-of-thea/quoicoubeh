<?php

return [
    'profile' => [
        'email' => env('PROFILE_EMAIL', ''),
        'name' => env('PROFILE_NAME', ''),
        'links' => [
            [
                'title' => 'Bento',
                'url' => 'https://bento.me/thea',
                'icon' => 'ri-planet-line'
            ],
            [
                'title' => 'GitHub',
                'url' => 'https://github.com/cup-of-thea',
                'icon' => 'ri-github-line'
            ],
            [
                'title' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/in/thea-%E2%9A%A1%EF%B8%8F-m-257b09271/',
                'icon' => 'ri-linkedin-box-line'
            ],
            [
                'title' => 'Twitter',
                'url' => 'https://twitter.com/thea_cake',
                'icon' => 'ri-twitter-line'
            ],
            [
                'title' => 'Instagram',
                'url' => 'https://www.instagram.com/thea_cupcake/',
                'icon' => 'ri-instagram-line'
            ],
            [
                'title' => 'Threads',
                'url' => 'https://www.threads.net/@thea_cupcake',
                'icon' => 'ri-threads-line'
            ],
            [
                'title' => 'Twitch',
                'url' => 'https://www.twitch.tv/thea_cake',
                'icon' => 'ri-twitch-line'
            ],
            [
                'title' => 'TikTok',
                'url' => 'https://www.tiktok.com/@thea_cake',
                'icon' => 'ri-tiktok-line'
            ],
            [
                'title' => 'BlueSky',
                'url' => 'https://bsky.app/profile/cupof.coffee',
                'icon' => 'ri-bluesky-line'
            ]
        ],
    ],
    'navbar' => [
        'links' => [
            [
                'title' => 'Home',
                'icon' => 'ri-home-heart-line',
                'url' => '/',
            ],
            [
                'title' => 'Blog',
                'icon' => 'ri-blogger-line',
                'url' => '/blog',
            ]
        ],
    ],
];
