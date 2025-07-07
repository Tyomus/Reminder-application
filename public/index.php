<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php require __DIR__ . "/../private/db.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $id = intval($_POST['id']);
        $stmt = $pdo->prepare("DELETE FROM reminders WHERE id = ?");
        $stmt->execute([$id]);

    } elseif (isset($_POST['title'])) {
        $id = ($_POST['id']) ?? null;
        $title = $_POST['title'];
        $description = $_POST['description'];
        $due_date = !empty($_POST['due_date']) ? $_POST['due_date'] : null;
        $reminder_date = !empty($_POST['reminder_date']) ? $_POST['reminder_date'] : null;
        $email = $_POST['email'] ?? null;
        
        if ($id) {
            $stmt = $pdo->prepare("UPDATE reminders SET 
                title=?, 
                description=?, 
                due_date=?, 
                reminder_date=?, 
                email=? 
                WHERE id=?");
            $stmt->execute([$title, $description, $due_date, $reminder_date, $email, $id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO reminders (
                title, 
                description, 
                due_date, 
                reminder_date, 
                email) 
                VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $description, $due_date, $reminder_date, $email]);
        }
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;  
    }        
}
$reminders = $pdo->query("SELECT * FROM reminders ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder App</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1><u>Simple Reminder App</u></h1>
    <table id="overview">
        <thead>            
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Due date</th>
                <th>Date for the reminder</th>
                <th>E-Mail</th>
                <th>Actions</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
             <?php 
             foreach ($reminders as $reminder): ?>
            <tr>
                <td><?= htmlspecialchars($reminder['title']) ?></td>
                <td><?= htmlspecialchars($reminder['description']) ?></td>
                <td><?= $reminder['due_date'] ? date('d.m.Y', strtotime($reminder['due_date'])) : '-' ?></td>
                <td><?= $reminder['reminder_date'] ? date('d.m.Y', strtotime($reminder['reminder_date'])) : '-' ?></td>
                <td><?= htmlspecialchars($reminder['email']) ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $reminder['id'] ?>">
                        <button type="submit" name="edit">Edit</button>
                        <button type="submit" name="delete">Delete</button>
                    </form>
                <td><?= date($reminder['created_at']) ?></td>    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <h2>Reminders Overview:</h2>
    </table>
    <?php require ("input_form.php"); ?>
</body>
</html>