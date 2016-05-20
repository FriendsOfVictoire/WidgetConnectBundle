<?php

namespace Victoire\Widget\ConnectBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\FormBundle\Form\Type\LinkType;

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
            ->add('link', LinkType::class, [
                'label' => 'widget_connect.form.redirect_url.label',
            ])
            ->add('formLogin', null, [
                'label' => 'widget_connect.form.form_login.label',
            ])
            ->add('resourceOwners', ResourceOwnersType::class);

        parent::buildForm($builder, $options);
    }

    /**
     * bind form to WidgetConnect entity
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\ConnectBundle\Entity\WidgetConnect',
            'widget'             => 'Connect',
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'victoire_widget_form_connect';
    }
}
