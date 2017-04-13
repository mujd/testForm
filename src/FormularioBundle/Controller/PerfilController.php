<?php

namespace FormularioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FormularioBundle\Form\PerfilType;
use FormularioBundle\Entity\Perfil;

class PerfilController extends Controller {

    public function indexAction() {
        return $this->render('FormularioBundle:Perfil:index.html.twig');
    }

    public function listAction() {
        $em = $this->getDoctrine()->getManager();
        $perfil = $em->getRepository('FormularioBundle:Perfil')->findAll();

        return $this->render('FormularioBundle:Perfil:list.html.twig', array(
                    'perfiles' => $perfil));
    }
    
    public function addAction(Request $request) {
        $perfil = new Perfil();
        $form = $this->createForm(PerfilType::class, $perfil);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($perfil);
                $flush = $em->flush();
                
            
            return $this->redirectToRoute("perfil_list");
        }
        return $this->render("FormularioBundle:Perfil:add.html.twig", array(
                    "form" => $form->createView()
        ));
    }

    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $perfil_repo = $em->getRepository("FormularioBundle:Perfil");
        $perfil = $perfil_repo->find($id);



        $form = $this->createForm(PerfilType::class, $perfil);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $em->flush();

            return $this->redirectToRoute("perfil_list");
        }

        return $this->render("FormularioBundle:Perfil:update.html.twig", array(
                    "form" => $form->createView()
        ));
    }

}
