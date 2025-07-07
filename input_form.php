<?php
if (isset($_POST['edit'])) {
    $edit_id = intval($_POST['id']);
    $stmt = $pdo->prepare("SELECT * FROM reminders WHERE id = ?");
    $stmt->execute([$edit_id]);
    $edit_reminder = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h2><?= isset($_POST['edit']) ? 'Edit' : 'Add new entry:' ?></h2>
<form method="post">
    <?php if (isset($edit_reminder)): ?>
        <input type="hidden" name="id" value="<?= $edit_reminder['id'] ?>">
    <?php endif; ?>

    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required 
               value="<?= isset($edit_reminder) ? htmlspecialchars($edit_reminder['title']) : '' ?>">
    </div>
    
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= isset($edit_reminder) ? htmlspecialchars($edit_reminder['description']) : '' ?></textarea>
    </div>
    
    <div>
        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" name="due_date" 
               value="<?= isset($edit_reminder) && $edit_reminder['due_date'] ? date('Y-m-d', 
               strtotime($edit_reminder['due_date'])) : '' ?>">
    </div>
    
    <div>
        <label for="reminder_date">Date for Reminder:</label>
        <input type="date" id="reminder_date" name="reminder_date"
               value="<?= isset($edit_reminder) && $edit_reminder['reminder_date'] ? date('Y-m-d', 
               strtotime($edit_reminder['reminder_date'])) : '' ?>">
    </div>

    <div>
        <label for="title">E-Mail:</label>
        <input type="email" id="email" name="email" required 
               value="<?= isset($edit_reminder) ? htmlspecialchars($edit_reminder['email']) : '' ?>">
    </div>
    
    <div>
        <button type="submit">Save</button>
    </div>
</form>