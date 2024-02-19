<?php


class SocialController {
    private $userModel;

    public function __construct() {
        // Initialize the User model
        $this->userModel = new User();
    }

    // Follow a user
    public function followUser($followerId, $followedId) {
        // Check if the follower and followed users exist
        $follower = $this->userModel->getUserProfile($followerId);
        $followed = $this->userModel->getUserProfile($followedId);

        if ($follower && $followed) {
            // Check if the user is already following
            $isFollowing = $this->isFollowing($followerId, $followedId);

            if (!$isFollowing) {
                // Follow the user in the model
                $followResult = $this->userModel->followUser($followerId, $followedId);

                if ($followResult) {
                    // Successfully followed
                    // You may redirect or display a success message
                    echo "Successfully followed {$followed->username}.";
                } else {
                    // Follow failed, display an error or redirect to an error page
                    echo "Failed to follow user.";
                }
            } else {
                // User is already following, display a message or redirect
                echo "You are already following {$followed->username}.";
            }
        } else {
            // Follower or followed user not found, display an error or redirect
            echo "Follower or followed user not found.";
        }
    }

    // Unfollow a user
    public function unfollowUser($followerId, $followedId) {
        // Check if the follower and followed users exist
        $follower = $this->userModel->getUserProfile($followerId);
        $followed = $this->userModel->getUserProfile($followedId);

        if ($follower && $followed) {
            // Check if the user is currently following
            $isFollowing = $this->isFollowing($followerId, $followedId);

            if ($isFollowing) {
                // Unfollow the user in the model
                $unfollowResult = $this->userModel->unfollowUser($followerId, $followedId);

                if ($unfollowResult) {
                    // Successfully unfollowed
                    // You may redirect or display a success message
                    echo "Successfully unfollowed {$followed->username}.";
                } else {
                    // Unfollow failed, display an error or redirect to an error page
                    echo "Failed to unfollow user.";
                }
            } else {
                // User is not currently following, display a message or redirect
                echo "You are not currently following {$followed->username}.";
            }
        } else {
            // Follower or followed user not found, display an error or redirect
            echo "Follower or followed user not found.";
        }
    }

    // Check if a user is following another user
    private function isFollowing($followerId, $followedId) {
        $followers = $this->userModel->getFollowers($followedId);

        foreach ($followers as $follower) {
            if ($follower->follower_id == $followerId) {
                return true;
            }
        }

        return false;
    }

    // Send a friend request
    public function sendFriendRequest($senderId, $receiverId) {
        // Check if the sender and receiver users exist
        $sender = $this->userModel->getUserProfile($senderId);
        $receiver = $this->userModel->getUserProfile($receiverId);

        if ($sender && $receiver) {
            // Check if a friend request already exists
            $existingRequest = $this->getFriendRequest($senderId, $receiverId);

            if (!$existingRequest) {
                // Send the friend request in the model
                $sendRequestResult = $this->userModel->sendFriendRequest($senderId, $receiverId);

                if ($sendRequestResult) {
                    // Successfully sent friend request
                    // You may redirect or display a success message
                    echo "Friend request sent to {$receiver->username}.";
                } else {
                    // Send request failed, display an error or redirect to an error page
                    echo "Failed to send friend request.";
                }
            } else {
                // Friend request already sent, display a message or redirect
                echo "Friend request already sent to {$receiver->username}.";
            }
        } else {
            // Sender or receiver user not found, display an error or redirect
            echo "Sender or receiver user not found.";
        }
    }

    // Cancel a friend request
    public function cancelFriendRequest($senderId, $receiverId) {
        // Check if the sender and receiver users exist
        $sender = $this->userModel->getUserProfile($senderId);
        $receiver = $this->userModel->getUserProfile($receiverId);

        if ($sender && $receiver) {
            // Check if the friend request exists
            $existingRequest = $this->getFriendRequest($senderId, $receiverId);

            if ($existingRequest) {
                // Cancel the friend request in the model
                $cancelRequestResult = $this->userModel->cancelFriendRequest($existingRequest->request_id);

                if ($cancelRequestResult) {
                    // Successfully canceled friend request
                    // You may redirect or display a success message
                    echo "Friend request to {$receiver->username} canceled.";
                } else {
                    // Cancel request failed, display an error or redirect to an error page
                    echo "Failed to cancel friend request.";
                }
            } else {
                // Friend request not found, display a message or redirect
                echo "Friend request not found.";
            }
        } else {
            // Sender or receiver user not found, display an error or redirect
            echo "Sender or receiver user not found.";
        }
    }

    // Accept or reject a friend request
    public function respondToFriendRequest($requestId, $response) {
        // Check if the friend request exists
        $friendRequest = $this->userModel->getFriendRequestById($requestId);

        if ($friendRequest) {
            // Respond to the friend request in the model
            $respondResult = $this->userModel->respondToFriendRequest($requestId, $response);

            if ($respondResult) {
                // Successfully responded to friend request
                // You may redirect or display a success message
                echo "Friend request {$response}.";
            } else {
                // Respond failed, display an error or redirect to an error page
                echo "Failed to respond to friend request.";
            }
        } else {
            // Friend request not found, display an error or redirect
            echo "Friend request not found.";
        }
    }

    // Get friend requests for a user
    public function getFriendRequests($userId) {
        // Get friend requests from the model
        $friendRequests = $this->userModel->getFriendRequests($userId);

        // Display or process friend requests as needed
        return $friendRequests;
    }

    // Fetch notifications for a user
    public function getNotifications($userId) {
        // Fetch notifications from the model
        $notifications = $this->userModel->getNotifications($userId);

        // Display or process notifications as needed
        return $notifications;
    }

    // Mark a notification as read
    public function markNotificationAsRead($notificationId) {
        // Mark notification as read in the model
        $markReadResult = $this->userModel->markNotificationAsRead($notificationId);

        if ($markReadResult) {
            // Successfully marked as read
            // You may redirect or display a success message
            echo "Notification marked as read.";
        } else {
            // Mark as read failed, display an error or redirect to an error page
            echo "Failed to mark notification as read.";
        }
    }
}
