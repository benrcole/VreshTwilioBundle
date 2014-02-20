<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 19/02/2014
 * Time: 15:11
 */

namespace Vresh\TwilioBundle\Admin;

    use Sonata\AdminBundle\Admin\Admin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Sonata\AdminBundle\Show\ShowMapper;

class MessageAdmin extends Admin
{


    protected $baseRouteName = 'vr_msg_admin';
    protected $baseRoutePattern = 'vr_msg_admin';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('telephoneNumber')
            ->add('recipient')
            ->add('content')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array( 'route' => array('name' => 'show')))
            ->add('recipient')
            ->add('telephoneNumber' , null, array( 'route' => array('name' => 'show')))
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    // Fields to be shown on lists
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('telephoneNumber')
            ->add('content')
            ->add('recipient')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
