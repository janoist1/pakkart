<?php

namespace HTD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * Admin homepage
     *
     * @Route("/", name="htd_admin_index")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }
}
