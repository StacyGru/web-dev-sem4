<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hello")
 */
class TestController
{
    /**
     * @Route(path="/", methods={"GET"})
     */
    public function index()
    {
        return new Response(
            "<h1> ПРИВЕТ !!! </h1>",
            Response::HTTP_OK,
            [
                'Content-type' => 'text/html'
            ]
        );
    }
}