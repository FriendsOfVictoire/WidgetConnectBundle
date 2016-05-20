<?php

namespace Victoire\Widget\ConnectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;

/**
 * WidgetConnect form type
 */
class ResourceOwnersType extends AbstractType
{
    protected $resource_owners;

    public function __construct($resource_owners) {
        $this->resource_owners = [];
        foreach ($resource_owners as $name => $resourceOwner) {
            $this->resource_owners[WidgetConnect::PREFIX_RESOURCE_OWNERS_FORM_LABEL . $name] = $name;
        }
    }

    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        foreach ($this->resource_owners as $key => $value) {
            $builder
                ->add(WidgetConnect::PREFIX_RESOURCE_OWNER_LABEL.$value, TextType::class, [
                    'label'  => WidgetConnect::PREFIX_RESOURCE_OWNER_FORM_LABEL . $key,
                ]);
        }

        if (!empty($this->resource_owners)) {
            $builder
                ->add('resource_owners', ChoiceType::class, [
                    'choices' => $this->resource_owners,
                    'choices_as_values' => true,
                    'multiple' => true,
                    'expanded' => true,
                ]);
        }
    }

    /**
     * get form name
     *
     * @return string The form name
     */
    public function getBlockPrefix()
    {
        return 'resource_owner_type';
    }
}
