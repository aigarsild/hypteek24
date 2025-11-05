<?php

/*
Plugin Name: Front Page Password (MU)
Description: Requires a simple shared password to view the front page. Set FRONTPAGE_PASSWORD in the environment.
Version: 1.0.0
Author: Project
*/

use function Env\env;

if (!defined('ABSPATH')) {
    exit;
}

add_action('template_redirect', function (): void {
    // Password from env or default
    $password = (string) (env('FRONTPAGE_PASSWORD') ?? 'avoragrupp');

    // Only protect the front page; logged-in users bypass
    if (!is_front_page() || (function_exists('is_user_logged_in') && is_user_logged_in())) {
        return;
    }

    // Compute a stable cookie value (hash) so the real password isn't stored client-side
    $hash = hash('sha256', 'fp:' . $password);
    $cookieName = 'fp_access';
    $hasCookie = isset($_COOKIE[$cookieName]) && hash_equals($_COOKIE[$cookieName], $hash);

    // If valid cookie exists, allow access
    if ($hasCookie) {
        return;
    }

    // Handle form submission
    $error = false;
    if (isset($_POST['fp_pass'])) {
        $submitted = (string) wp_unslash($_POST['fp_pass']);
        if (hash_equals($password, $submitted)) {
            $ttlHours = (int) (env('FRONTPAGE_PASSWORD_TTL_HOURS') ?? 12);
            $expires = time() + max(1, $ttlHours) * 3600;
            setcookie(
                $cookieName,
                $hash,
                [
                    'expires'  => $expires,
                    'path'     => '/',
                    'secure'   => is_ssl(),
                    'httponly' => true,
                    'samesite' => 'Lax',
                ]
            );
            // Avoid resubmission; redirect to current URL
            wp_safe_redirect(esc_url_raw(add_query_arg([])));
            exit;
        }
        $error = true;
    }

    // Output minimal password form with 401 status to hint auth required
    if (!headers_sent()) {
        nocache_headers();
        status_header(401);
        header('Content-Type: text/html; charset=utf-8');
    }

    $title = esc_html(env('FRONTPAGE_PASSWORD_TITLE') ?: 'Enter password');
    $hint  = esc_html(env('FRONTPAGE_PASSWORD_HINT') ?: '');

    echo '<!doctype html>' .
        '<html lang="en">' .
        '<head>' .
        '<meta charset="utf-8" />' .
        '<meta name="viewport" content="width=device-width, initial-scale=1" />' .
        '<title>' . $title . '</title>' .
        '<style>body{margin:0;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif;background:#0b132b;color:#e0e6ed;display:flex;align-items:center;justify-content:center;min-height:100vh} .card{max-width:560px;padding:32px;border-radius:12px;background:#1c2541;box-shadow:0 10px 30px rgba(0,0,0,.3)} h1{margin:0 0 12px;font-size:28px} p{margin:0 0 18px;color:#b8c2cc;line-height:1.6} form{display:flex;gap:8px} input[type=password]{flex:1;padding:10px 12px;border-radius:8px;border:1px solid #2d3a6a;background:#111831;color:#e0e6ed} button{padding:10px 14px;border-radius:8px;border:0;background:#3a86ff;color:#fff;cursor:pointer} .err{color:#ff6b6b;margin:0 0 12px}</style>' .
        '</head>' .
        '<body>' .
        '<div class="card">' .
        '<h1>' . $title . '</h1>' .
        ($hint !== '' ? '<p>' . $hint . '</p>' : '') .
        ($error ? '<p class="err">Incorrect password. Please try again.</p>' : '') .
        '<form method="post" action="">' .
        '<input type="password" name="fp_pass" placeholder="Password" autocomplete="current-password" required />' .
        '<button type="submit">Enter</button>' .
        '</form>' .
        '</div>' .
        '</body>' .
        '</html>';

    exit;
}, 0);


