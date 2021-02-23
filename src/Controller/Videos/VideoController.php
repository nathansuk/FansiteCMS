<?php

namespace App\Controller\Videos;

use App\Services\Videos\VideoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    /**
     * @Route("/videos", name="videos")
     * @param VideoService $videoService
     * @return Response
     */
    public function index(VideoService $videoService): Response
    {
        /**
         * Using object relation we can get all videos who belongs to one playlist.
         * Note for me : Needed to add relation ManyToOne to the video entity.
         */
        $playlists = $videoService->getPlaylist();


        return $this->render('video/index.html.twig', [
            'controller_name' => 'VideoController',
            'playlists' => $playlists
        ]);
    }
}
