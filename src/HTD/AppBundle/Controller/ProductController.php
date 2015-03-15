<?php

namespace HTD\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $products = $this->getDoctrine()->getRepository('HTDAppBundle:Product')->findAll();

        return [
            'products' => $products
        ];
    }
}
