<!DOCTYPE HTML>
<html lang="fr-FR">
<?php
include('includes/head.php');
include('actions/db.php');
include('includes/auth.php');
?>
<body>
<?php
$lineheight = 'uneligne';
$src = 'image/PictoContact.gif';
$alt = 'un oiseau au telephone';
$titre = 'Horaires d\'ouverture et informations';
$page = 6;
include('includes/header.php');
?>
<?php include('includes/nav.php'); ?>
<article class="doc">

<?php
$months = [
    'January' => 'Janvier',
    'February' => 'Février',
    'March' => 'Mars',
    'April' => 'Avril',
    'May' => 'Mai',
    'June' => 'Juin',
    'July' => 'Juillet',
    'August' => 'Aout',
    'September' => 'Septembre',
    'October' => 'Octobre',
    'November' => 'Novembre',
    'December' => 'Décembre'
];

$days = [
    'Monday' => 'Lundi',
    'Tuesday' => 'Mardi',
    'Wednesday' => 'Mercredi',
    'Thursday' => 'Jeudi',
    'Friday' => 'Vendredi',
    'Saturday' => 'Samedi',
    'Sunday' => 'Dimanche'
];

$datetoday = new DateTime('now');
$datein2months = new DateTime('now + 2 months');
$sql = 'SELECT start, end FROM events WHERE cat_creneau = 0 AND public = 1 ORDER by start ASC';
$sth = $db->query($sql);
$results = $sth->fetchAll();

$db->exec(
    'CREATE TABLE IF NOT EXISTS opening_alerts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(120) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        UNIQUE KEY uniq_opening_alert_code (code)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8'
);

$defaultAlerts = [
    'canicule' => "Pour faciliter le tri et le rangement, le dépôt textile est limité à 2 sacs de taille raisonnable par personne et uniquement aux vêtements de saison. Merci de votre contribution !",
    'estival' => 'Attention, nous serons fermés le 1er Novembre 2025. Merci de votre compréhension.'
];

$seedStmt = $db->prepare('INSERT IGNORE INTO opening_alerts (code, message) VALUES (:code, :message)');
foreach ($defaultAlerts as $code => $message) {
    $seedStmt->execute([
        'code' => $code,
        'message' => $message,
    ]);
}

if (is_admin_logged() && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'update') {
        $id = (int) ($_POST['id'] ?? 0);
        $message = trim((string) ($_POST['message'] ?? ''));

        if ($id > 0 && $message !== '') {
            $stmt = $db->prepare('UPDATE opening_alerts SET message = :message WHERE id = :id');
            $stmt->execute([
                'id' => $id,
                'message' => $message,
            ]);
        }
    }

    if ($action === 'create') {
        $code = normalize_pseudo((string) ($_POST['code'] ?? ''));
        $message = trim((string) ($_POST['message'] ?? ''));

        if ($code !== '' && $message !== '') {
            $stmt = $db->prepare('INSERT INTO opening_alerts (code, message) VALUES (:code, :message) ON DUPLICATE KEY UPDATE message = VALUES(message)');
            $stmt->execute([
                'code' => $code,
                'message' => $message,
            ]);
        }
    }

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);

        if ($id > 0) {
            $stmt = $db->prepare('DELETE FROM opening_alerts WHERE id = :id');
            $stmt->execute(['id' => $id]);
        }
    }

    header('Location: ouverture.php');
    exit;
}

$alerts = $db->query('SELECT id, code, message FROM opening_alerts ORDER BY FIELD(code, "canicule", "estival"), id ASC')->fetchAll();
?>

    <h1>Les jours d'ouvertures sur les 2 prochains mois.</h1>

    <?php foreach ($alerts as $alert): ?>
        <div class="opening-alert opening-alert-<?= htmlspecialchars((string) $alert['code']) ?>">
            <?= nl2br(htmlspecialchars((string) $alert['message'])) ?>
        </div>
    <?php endforeach; ?>

    <?php if (is_admin_logged()): ?>
        <section class="admin-panel">
            <h2>Gestion des alertes</h2>
            <p>Connecté : <strong><?= htmlspecialchars((string) $_SESSION['admin_user']['pseudo']) ?></strong> — <a href="login.php?logout=1">Se déconnecter</a></p>

            <?php foreach ($alerts as $alert): ?>
                <form method="post" class="alert-form">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?= (int) $alert['id'] ?>">
                    <label>Code : <strong><?= htmlspecialchars((string) $alert['code']) ?></strong></label>
                    <textarea name="message" rows="3" required><?= htmlspecialchars((string) $alert['message']) ?></textarea>
                    <div class="form-actions">
                        <button type="submit">Enregistrer</button>
                    </div>
                </form>
                <form method="post" class="delete-form" onsubmit="return confirm('Supprimer cette alerte ?');">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= (int) $alert['id'] ?>">
                    <button type="submit">Supprimer</button>
                </form>
            <?php endforeach; ?>

            <form method="post" class="alert-form create-form">
                <h3>Ajouter une alerte</h3>
                <input type="hidden" name="action" value="create">
                <label for="code">Code (ex: canicule, estival)</label>
                <input id="code" name="code" type="text" required>
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="3" required></textarea>
                <button type="submit">Ajouter / mettre à jour</button>
            </form>
        </section>
    <?php endif; ?>

    <table class='tableauouverture'>
        <tr class='ligneouverture'>
            <th class='celluleheadouverture'>Date</th>
            <th class='celluleheadouverture'>Heure d'ouverture</th>
            <th class='celluleheadouverture'>Heure de fermeture</th>
            <th class='celluleheadouverture'></th>
        </tr>

<?php
foreach ($results as $v) {
    $datetimestart = new DateTime('' . $v['start'] . '');
    $datetimeend = new DateTime('' . $v['end'] . '');

    $date = $datetimestart->format('l-d-F-Y');
    $datefrench = explode('-', $date);
    $semaine = $datetimestart->format('W');
    $test = $semaine / 2;

    if ($datetimestart->format('Y-m-d') === '2025-08-02') {
        $mess = 'Vente uniquement';
        $mess1 = '';
    } elseif (is_int($test)) {
        $mess = 'Vente uniquement';
        $mess1 = '';
    } else {
        $mess = 'Vente + dépot';
        $mess1 = ' - Limite Dépôt 17:00';
    }

    foreach ($days as $k => $v) {
        if ($k == $datefrench[0]) {
            $datefrench[0] = $v;
        }
    }
    foreach ($months as $k => $v) {
        if ($k == $datefrench[2]) {
            $datefrench[2] = $v;
        }
    }
    $datefrench = implode(' ', $datefrench);
    $heurestart = $datetimestart->format('G:i');
    $heureend = $datetimeend->format('G:i');
    if ($datetimeend > $datetoday && $datetimeend < $datein2months) {
        echo '<tr>

            <td class="celluleouverture">' . $datefrench . '</td>
            <td class="celluleouverture">' . $heurestart . '</td>
            <td class="celluleouverture">' . $heureend . '' . $mess1 . '</td>
            <td class="celluleouverture">' . $mess . '</td>



          </tr>';
    }
}
?>
    </table>

    <h1>Les objets acceptés.</h1>

    <p class='odd justify'>
        Etant donné notre petite équipe, nous acceptons les objets de petites tailles (transportables à une personne), en bonne état de fonctionnement. Nous prenons tous types d'objet, mais nous insistons sur le fait que nous ne sommes pas une déchèterie.
        Les vêtements apportés doivent être propres, et en bon état. Les jeux de sociétés doivent être complets (ou il faut signaler les pièces manquantes) afin que ceux-ci puissent être réutilisés. Pour tout objet, il faut se poser la question :
    </p>
    <p class="but">EST-CE QUE JE POURRAIS L'ACHETER ET L'UTILISER SANS SOUCI ?</p>
    <p class='even justify'>
        Si vous souhaitez vous décharger de gros objets, comme des gros meubles, vous pouvez toujours nous contacter et nous envoyer une photo, afin de faire le point directement avec vous. En effet, la place ainsi que la main d'oeuvre n'étant pas infinie, chaque gros objet doit avoir été autorisé au préalable.
    </p>
    <p class='odd justify'>
        Nous ne pouvons pas nous déplacer chez vous pour venir retirer les objets. Les seules objets que nous acceptons pour le moment concernent vos apports volontaires à la ressourcerie sur les jours et horaires d'ouverture.
    </p>

</article>
<?php
$linesupp = NULL;
include('footer.php');
?>
</body>
</html>
