<?php

namespace HTD\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HTD\AppBundle\Entity\AboutUs;
use HTD\AppBundle\Form\AboutUsType;

/**
 * AboutUs controller.
 *
 * @Route("/aboutus")
 */
class AboutUsController extends Controller
{

    /**
     * Lists all AboutUs entities.
     *
     * @Route("/", name="aboutus")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HTDAppBundle:AboutUs')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AboutUs entity.
     *
     * @Route("/", name="aboutus_create")
     * @Method("POST")
     * @Template("HTDAppBundle:AboutUs:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AboutUs();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('aboutus_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a AboutUs entity.
     *
     * @param AboutUs $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AboutUs $entity)
    {
        $form = $this->createForm(new AboutUsType(), $entity, array(
            'action' => $this->generateUrl('aboutus_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AboutUs entity.
     *
     * @Route("/new", name="aboutus_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AboutUs();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AboutUs entity.
     *
     * @Route("/{id}", name="aboutus_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HTDAppBundle:AboutUs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AboutUs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AboutUs entity.
     *
     * @Route("/{id}/edit", name="aboutus_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HTDAppBundle:AboutUs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AboutUs entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a AboutUs entity.
    *
    * @param AboutUs $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AboutUs $entity)
    {
        $form = $this->createForm(new AboutUsType(), $entity, array(
            'action' => $this->generateUrl('aboutus_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AboutUs entity.
     *
     * @Route("/{id}", name="aboutus_update")
     * @Method("PUT")
     * @Template("HTDAppBundle:AboutUs:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HTDAppBundle:AboutUs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AboutUs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('aboutus_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AboutUs entity.
     *
     * @Route("/{id}", name="aboutus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HTDAppBundle:AboutUs')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AboutUs entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('aboutus'));
    }

    /**
     * Creates a form to delete a AboutUs entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aboutus_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
