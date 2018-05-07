<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need

        $em =$this->getDoctrine()->getManager();
        $posts=$em->getRepository('AdminBundle:Post')->findBy([],['datepublish'=>'desc'],3,0);
        return $this->render('default/index.html.twig', [
           'posts' =>$posts
        ]);
    }


    /**
     * @Route("/blog", name="blog")
     */
    public function blogAction(Request $request)
    {
        // replace this example code with whatever you need

        $em =$this->getDoctrine()->getManager();
        $posts=$em->getRepository('AdminBundle:Post')->findAll();

        $paginator = $this->get('knp_paginator');

        $paginationBlog = $paginator->paginate(
            $posts,
            $request->query->getInt('page' ,1),
           5


        );

        return $this->render('default/blog.html.twig',[
           'posts' => $paginationBlog
        ]);
    }

    /**
     * @Route("/blog/{id}", name="showblog")
     */
    public function ShowblogAction($id)
    {
        // replace this example code with whatever you need

        $em =$this->getDoctrine()->getManager();
        $posts=$em->getRepository('AdminBundle:Post')->find($id);
        return $this->render('default/showblog.html.twig',[
           'posts' =>$posts
        ]);
    }




    /**
     * @Route("/admin/", name="adminpage")
     */
    public function adminAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/admin.html.twig', []);
            
        
    }

    public function GitMss(){

        echo "bonjour tout le monde"; 
    }



}
