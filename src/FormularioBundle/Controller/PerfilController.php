<?php

namespace FormularioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FormularioBundle\Form\PerfilType;
use FormularioBundle\Form\PerfilCompetenciaType;
use FormularioBundle\Entity\Perfil;
use FormularioBundle\Entity\PerfilCompetencia;
use Doctrine\Common\Collections\ArrayCollection;

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
        
        $originalCompetencias = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($perfil->getPerfilCompetencias() as $competencia) {
            $originalCompetencias->add($competencia);
        }
        
        $form = $this->createForm(PerfilType::class, $perfil);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            
             // remove the relationship between the competencia and the Task
            foreach ($originalCompetencias as $competencia) {
                if (false === $perfil->getPerfilCompetencias()->contains($competencia)) {
                    // remove the Task from the Tag
                    $competencia->getPerfil()->removeElement($perfil);

                    // if it was a many-to-one relationship, remove the relationship like this
                    // $competencia->setTask(null);

                    $em->persist($competencia);

                    // if you wanted to delete the Tag entirely, you can also do that
                    // $em->remove($competencia);
                }
            }
            
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

    public function editAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $perfil = $em->getRepository('FormularioBundle:Perfil')->find($id);

        if (!$perfil) {
            throw $this->createNotFoundException('No perfil found for id ' . $id);
        }

        $originalCompetencias = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($perfil->getPerfilCompetencias() as $competencia) {
            $originalCompetencias->add($competencia);
        }

        $editForm = $this->createForm(PerfilType::class, $perfil);

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            // remove the relationship between the competencia and the Task
            foreach ($originalCompetencias as $competencia) {
                if (false === $perfil->getPerfilCompetencias()->contains($competencia)) {
                    // remove the Task from the Tag
                    $competencia->getPerfil()->removeElement($perfil);

                    // if it was a many-to-one relationship, remove the relationship like this
                    // $competencia->setTask(null);

                    $em->persist($competencia);

                    // if you wanted to delete the Tag entirely, you can also do that
                    // $em->remove($competencia);
                }
            }

            $em->persist($perfil);
            $em->flush();
            $parametro["id"] = $id;
            // redirect back to some edit page
            return $this->redirectToRoute('perfil_edit', $parametro);
        }

        return $this->render("FormularioBundle:Perfil:edit.html.twig", array(
                    "form" => $editForm->createView()
        ));
    }

}
