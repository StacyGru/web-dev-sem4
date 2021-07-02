<?php


namespace App\Api\Controller;


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
            '<h1>Приветствуем вас!</h1>',
            Response::HTTP_OK,
            [
                'Content-type' => 'text/html'
            ]
        );
    }



    /**
     * @Route(path="/users", methods={"GET"})
     */
    public function users()
    {
        return new Response(
            '<h1>Поздравляем, вы авторизовались!</h1>',
            Response::HTTP_OK,
            [
                'Content-type' => 'text/html'
            ]
        );
    }
}
