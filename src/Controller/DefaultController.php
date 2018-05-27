<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 4:07 PM
 */

namespace App\Controller;


use App\Model\Operator\OperatorFactory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        $ratios = $this->getDoctrine()->getRepository('App:Exchange')->getLowestRatios();

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse($ratios);
        } else {
            return $this->render('index.html.twig', ['ratios' => $ratios]);
        }
    }

    public function fetch()
    {
        try {
            $operator = OperatorFactory::create($this->container);
            $operator->operate();

            return $this->redirectToRoute('index');
        } catch (\Exception $ex) {
            $this->addFlash('error', '');
            return $this->redirectToRoute('index');
        }
    }
}