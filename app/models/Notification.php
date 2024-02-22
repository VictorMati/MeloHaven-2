<?php

class Notification {
    private $db;

    public function __construct() {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    // Notification-related methods

    // Get notifications for a user
    public function getNotifications($userId) {
        $query = "SELECT * FROM Notifications WHERE user_id = :user_id ORDER BY timestamp DESC";
        $data = [':user_id' => $userId];

        return $this->db->fetchAllRows($query, $data);
    }

    // Mark a notification as read
    public function markNotificationAsRead($notificationId) {
        $query = "UPDATE Notifications SET read_status = true WHERE notification_id = :notification_id";
        $data = [':notification_id' => $notificationId];

        return $this->db->executeQuery($query, $data);
    }

    // Delete a notification
    public function deleteNotification($notificationId) {
        $query = "DELETE FROM Notifications WHERE notification_id = :notification_id";
        $data = [':notification_id' => $notificationId];

        return $this->db->executeQuery($query, $data);
    }
}

// Example usage:
// $notificationModel = new Notification();
// $notifications = $notificationModel->getNotifications($userId);
// $markAsReadResult = $notificationModel->markNotificationAsRead($notificationId);
