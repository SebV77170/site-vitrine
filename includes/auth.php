<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function normalize_pseudo(string $pseudo): string
{
    $value = trim(mb_strtolower($pseudo, 'UTF-8'));

    if (class_exists('Transliterator')) {
        $trans = Transliterator::create('NFD; [:Nonspacing Mark:] Remove; NFC');
        if ($trans) {
            $value = $trans->transliterate($value);
        }
    } else {
        $iconv = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);
        if ($iconv !== false) {
            $value = $iconv;
        }
    }

    return preg_replace('/[^a-z0-9]/', '', $value) ?? '';
}

function users_table_has_pseudo_normalise(PDO $db): bool
{
    static $hasColumn = null;

    if ($hasColumn !== null) {
        return $hasColumn;
    }

    $stmt = $db->query("SHOW COLUMNS FROM users LIKE 'pseudo_normalise'");
    $hasColumn = (bool) $stmt->fetch();

    return $hasColumn;
}

function find_admin_user(PDO $db, string $pseudo): ?array
{
    $pseudoNormalise = normalize_pseudo($pseudo);

    if ($pseudoNormalise === '') {
        return null;
    }

    if (users_table_has_pseudo_normalise($db)) {
        $stmt = $db->prepare('SELECT * FROM users WHERE pseudo_normalise = :pseudo_normalise LIMIT 1');
        $stmt->execute(['pseudo_normalise' => $pseudoNormalise]);
        $user = $stmt->fetch();

        return $user ?: null;
    }

    $stmt = $db->query('SELECT * FROM users WHERE admin = 2');
    while ($user = $stmt->fetch()) {
        if (normalize_pseudo((string) ($user['pseudo'] ?? '')) === $pseudoNormalise) {
            return $user;
        }
    }

    return null;
}

function verify_user_password(array $user, string $password): bool
{
    $stored = (string) ($user['password'] ?? '');

    if ($stored === '') {
        return false;
    }

    if (password_verify($password, $stored)) {
        return true;
    }

    return hash_equals($stored, $password);
}

function login_admin(PDO $db, string $pseudo, string $password): bool
{
    $user = find_admin_user($db, $pseudo);

    if (!$user || (int) ($user['admin'] ?? 0) !== 2) {
        return false;
    }

    if (!verify_user_password($user, $password)) {
        return false;
    }

    $_SESSION['admin_user'] = [
        'id' => (int) $user['id'],
        'pseudo' => (string) ($user['pseudo'] ?? ''),
        'admin' => (int) $user['admin'],
    ];

    return true;
}

function logout_admin(): void
{
    unset($_SESSION['admin_user']);
}

function is_admin_logged(): bool
{
    return isset($_SESSION['admin_user']) && (int) ($_SESSION['admin_user']['admin'] ?? 0) === 2;
}
