<?php

class HomeController extends Controller
{
    private $songModel;
    private $artistModel;
    private $bannerModel;

    public function __construct()
    {
        parent::__construct();
        // Initialize models used by HomeController
        $this->songModel = $this->loadModel('Song');
        $this->artistModel = $this->loadModel('Artist');
        $this->bannerModel = $this->loadModel('Banner');
    }

    // Method to load the home page
    public function index()
    {
        // Fetch data for various sections
        $newReleases = $this->songModel->getNewReleases();
        $recommendedMusic = $this->songModel->getRecommendedMusic();
        $popularArtists = $this->artistModel->getPopularArtists();
        $bannerSlides = $this->bannerModel->getBannerSlides();

        // Load the home page view with the fetched data
        $this->loadView('home/index', [
            'newReleases' => $newReleases,
            'recommendedMusic' => $recommendedMusic,
            'popularArtists' => $popularArtists,
            'bannerSlides' => $bannerSlides,
        ]);
    }

    // Method to handle banner slides
    public function handleBannerSlides()
    {
        // Logic for handling banner slides, if needed
    }

    // Method to display various sections
    public function displaySections()
    {
        // Logic for displaying various sections, if needed
    }
}
