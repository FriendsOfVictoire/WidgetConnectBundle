<?php

namespace Victoire\Widget\ConnectBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Widget\ConnectBundle\Transformer\ResourceOwnersToArrayTransformer;

/**
 * WidgetConnect form type
 */
class WidgetConnectType extends WidgetType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('link', 'victoire_link', [
                'label' => 'widget_connect.form.redirect_url.label',
            ])
            ->add('formLogin', null, [
                'label' => 'widget_connect.form.form_login.label',
            ])
            ->add('resourceOwners', 'resource_owner_type');

        parent::buildForm($builder, $options);
    }

    /**
     * bind form to WidgetConnect entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\ConnectBundle\Entity\WidgetConnect',
            'widget'             => 'Connect',
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get form name
     *
     * @return string The form name
     */
    public function getName()
    {
        return 'victoire_widget_form_connect';
    }
}
