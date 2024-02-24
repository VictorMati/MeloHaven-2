<?php

class RecommendationController extends Controller {

  private $recommendationModel;

  public function __construct() {
    $this->recommendationModel = $this->loadModel('Recommendation'); 

    if (!isset($_SESSION['user_id'])) {
      $this->redirectTo('login');
    }
  }

  public function getRecommendedSongs($userId)
{

    $recommendations = $this->recommendationModel->getRecommendationsForUser($userId);

    $songs = [];

    foreach ($recommendations as $recommendation) {
        $songModel = $this->loadModel('Song');
        $song = $songModel->getSong($recommendation['song_id']);
        if ($song) {
            $songs[] = $song;
        }
    }

    $this->loadView('recommended_songs', ['songs' => $songs]);
}

}