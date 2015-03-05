<?php

namespace HTD\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HTD\AppBundle\Entity\AnimBG;
use HTD\AppBundle\Form\AnimBGType;

/**
 * AnimBG controller.
 *
 * @Route("/animbg")
 */
class AnimBGController extends Controller
{

    /**
     * Lists all AnimBG entities.
     *
     * @Route("/", name="animbg")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HTDAppBundle:AnimBG')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AnimBG entity.
     *
     * @Route("/", name="animbg_create")
     * @Method("POST")
     * @Template("HTDAppBundle:AnimBG:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AnimBG();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('animbg_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a AnimBG entity.
     *
     * @param AnimBG $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AnimBG $entity)
    {
        $form = $this->createForm(new AnimBGType(), $entity, array(
            'action' => $this->generateUrl('animbg_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AnimBG entity.
     *
     * @Route("/new", name="animbg_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AnimBG();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AnimBG entity.
     *
     * @Route("/{id}", name="animbg_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HTDAppBundle:AnimBG')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AnimBG entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AnimBG entity.
     *
     * @Route("/{id}/edit", name="animbg_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HTDAppBundle:AnimBG')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AnimBG entity.');
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
    * Creates a form to edit a AnimBG entity.
    *
    * @param AnimBG $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AnimBG $entity)
    {
        $form = $this->createForm(new AnimBGType(), $entity, array(
            'action' => $this->generateUrl('animbg_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AnimBG entity.
     *
     * @Route("/{id}", name="animbg_update")
     * @Method("PUT")
     * @Template("HTDAppBundle:AnimBG:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HTDAppBundle:AnimBG')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AnimBG entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('animbg_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AnimBG entity.
     *
     * @Route("/{id}", name="animbg_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HTDAppBundle:AnimBG')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AnimBG entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('animbg'));
    }

    /**
     * Creates a form to delete a AnimBG entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animbg_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
