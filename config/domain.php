<?php

return [
    'streams_link' => 'https://www.twitch.tv/thea_cake',
    'profile' => [
        'email' => env('PROFILE_EMAIL', ''),
        'name' => env('PROFILE_NAME', ''),
        'bio' => "Salut, je suis Thea, streameuse, cré-autrice de contenus (ici et ailleurs) et développeuse.
                  J'aime beaucoup faire du craft, de la reliure, des vêtements, des bougies, des cottes de mailles, fin du classique quoi (feur).
                  Mais on fait aussi des jeux vidéo et on parle de socio, et de plein d'autres sujets.<br/>Ici, je parle d'identité de genre,
                  je fais de la fiction, je parle d'actualité et de revues de lecture, jeux, films, séries, etc.",
        'pronouns' => env('PROFILE_PRONOUNS', ''),
        'links' => [
            [
                'title' => 'Twitch',
                'url' => 'https://www.twitch.tv/thea_cake',
                'name' => '@thea_cake',
                'icon' => 'ri-twitch-line'
            ],
            [
                'title' => 'BlueSky',
                'url' => 'https://bsky.app/profile/cupof.coffee',
                'name' => '@cupof.coffee',
                'icon' => 'ri-bluesky-line'
            ],
            [
                'title' => 'TikTok',
                'url' => 'https://www.tiktok.com/@thea_cake',
                'name' => '@thea_cake',
                'icon' => 'ri-tiktok-line'
            ],
            [
                'title' => 'Instagram',
                'url' => 'https://www.instagram.com/thea_cupcake/',
                'name' => '@thea_cupcake',
                'icon' => 'ri-instagram-line'
            ],
            [
                'title' => 'Threads',
                'url' => 'https://www.threads.net/@thea_cupcake',
                'name' => '@thea_cupcake',
                'icon' => 'ri-threads-line'
            ],
            [
                'title' => 'Twitter',
                'url' => 'https://twitter.com/thea_cake',
                'name' => '@thea_cake',
                'icon' => 'ri-twitter-line'
            ],
            [
                'title' => 'Bento',
                'url' => 'https://bento.me/thea',
                'name' => 'Bento@thea',
                'icon' => 'ri-planet-line'
            ],
        ],
    ],
    'navbar' => [
        'links' => [
            [
                'title' => 'Accueil',
                'icon' => 'ri-home-heart-line',
                'url' => '/',
            ],
            [
                'title' => 'Articles',
                'icon' => 'ri-article-line',
                'url' => '/blog',
            ],
            [
                'title' => 'Séries',
                'icon' => 'ri-guide-line',
                'url' => '/shows',
            ],
            [
                'title' => 'Projets',
                'icon' => 'ri-twitch-line',
                'url' => '/projects',
            ],
            [
                'title' => 'Événements',
                'icon' => 'ri-chat-heart-line',
                'url' => '/events',
            ],
        ],
    ],
];
