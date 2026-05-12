<?php
// ─── Site Configuration ───────────────────────────────────────────────────────
define('SITE_NAME',     'Ayodeji');
define('SITE_EMAIL',    'ayodeji@email.com');
define('SITE_PHONE',    '+234 800 000 0000');
define('SITE_LOCATION', 'Nigeria');
define('GITHUB_URL',    'https://github.com/ayodeji');
define('LINKEDIN_URL',  'https://linkedin.com/in/ayodeji');
define('WHATSAPP_URL',  'https://wa.me/2348000000000');

// ─── Projects Data ────────────────────────────────────────────────────────────
$projects = [
  [
    'id'          => 1,
    'title'       => 'Crypto Wallet App',
    'description' => 'A full-featured cryptocurrency wallet with real-time prices, deposits, swaps, and transaction history.',
    'tags'        => ['PHP', 'MySQL', 'JavaScript', 'CSS3'],
    'icon'        => 'fa-wallet',
    'color'       => '#00d4ff',
    'github'      => '#',
    'live'        => '#',
    'featured'    => true,
  ],
  [
    'id'          => 2,
    'title'       => 'Attendance Management System',
    'description' => 'A PHP-based system for tracking student attendance with an admin panel, course management, and reporting.',
    'tags'        => ['PHP', 'MySQL', 'JavaScript'],
    'icon'        => 'fa-clipboard-user',
    'color'       => '#7b2fff',
    'github'      => '#',
    'live'        => '#',
    'featured'    => true,
  ],
  [
    'id'          => 3,
    'title'       => 'Football Game',
    'description' => 'An interactive browser-based football game built with JavaScript featuring smooth animations and gameplay.',
    'tags'        => ['JavaScript', 'HTML5', 'CSS3'],
    'icon'        => 'fa-futbol',
    'color'       => '#00d4ff',
    'github'      => '#',
    'live'        => '#',
    'featured'    => true,
  ],
  [
    'id'          => 4,
    'title'       => 'Personal Portfolio',
    'description' => 'A responsive personal portfolio website showcasing projects, skills, and contact information with a dark neon theme.',
    'tags'        => ['PHP', 'CSS3', 'JavaScript'],
    'icon'        => 'fa-user-tie',
    'color'       => '#7b2fff',
    'github'      => '#',
    'live'        => '#',
    'featured'    => false,
  ],
];

// ─── Skills Data ──────────────────────────────────────────────────────────────
$skills = [
  'Frontend' => [
    ['name' => 'HTML',        'level' => 95, 'icon' => 'fab fa-html5',    'color' => '#e34f26'],
    ['name' => 'CSS',         'level' => 90, 'icon' => 'fab fa-css3-alt', 'color' => '#1572b6'],
    ['name' => 'JavaScript',  'level' => 85, 'icon' => 'fab fa-js',       'color' => '#f7df1e'],
    ['name' => 'React',       'level' => 78, 'icon' => 'fab fa-react',    'color' => '#61dafb'],
  ],
  'Backend' => [
    ['name' => 'PHP',         'level' => 92, 'icon' => 'fab fa-php',      'color' => '#777bb4'],
    ['name' => 'MySQL',       'level' => 88, 'icon' => 'fas fa-database', 'color' => '#4479a1'],
    ['name' => 'Node.js',     'level' => 72, 'icon' => 'fab fa-node-js',  'color' => '#339933'],
  ],
  'Design' => [
    ['name' => 'UI/UX Design','level' => 82, 'icon' => 'fas fa-palette',  'color' => '#ff2d78'],
  ],
];
