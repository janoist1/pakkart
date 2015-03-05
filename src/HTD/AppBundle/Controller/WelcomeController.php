<?php

namespace HTD\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HTD\AppBundle\Entity\Welcome;
use HTD\AppBundle\Form\WelcomeType;

/**
 * Welcome controller.
 *
 * @Route("/welcome")
 */
class WelcomeController extends Controller
{

    /**
     * Lists all Welcome entities.
     *
     * @Route("/", name="welcome")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HTDAppBundle:Welcome')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Welcome entity.
     *
     * @Route("/", name="welcome_create")
     * @Method("POST")
     * @Template("HTDAppBundle:Welcome:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Welcome();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('welcome_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Welcome entity.
     *
     * @param Welcome $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Welcome $entity)
    {
        $form = $this->createForm(new WelcomeType(), $entity, array(
            'action' => $this->generateUrl('welcome_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Welcome entity.
     *
     * @Route("/new", name="welcome_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Welcome();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Welcome entity.
     *
     * @Route("/{id}", name="welcome_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HTDAppBundle:Welcome')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Welcome entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Welcome entity.
     *
     * @Route("/{id}/edit", name="welcome_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HTDAppBundle:Welcome')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Welcome entity.');
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
    * Creates a form to edit a Welcome entity.
    *
    * @param Welcome $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Welcome $entity)
    {
        $form = $this->createForm(new WelcomeType(), $entity, array(
            'action' => $this->generateUrl('welcome_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Welcome entity.
     *
     * @Route("/{id}", name="welcome_update")
     * @Method("PUT")
     * @Template("HTDAppBundle:Welcome:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HTDAppBundle:Welcome')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Welcome entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('welcome_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Welcome entity.
     *
     * @Route("/{id}", name="welcome_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HTDAppBundle:Welcome')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Welcome entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('welcome'));
    }

    /**
     * Creates a form to delete a Welcome entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('welcome_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
