<?php
include "../config/db.php";

/* Delete expired public rooms (48h) */
$conn->query("
DELETE FROM rooms 
WHERE room_type='public' 
AND created_at < NOW() - INTERVAL 48 HOUR
");

/* Delete orphan messages */
$conn->query("
DELETE FROM messages 
WHERE room_id NOT IN (SELECT room_id FROM rooms)
");
