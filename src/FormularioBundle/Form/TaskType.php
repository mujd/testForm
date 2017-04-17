<?php

namespace FormularioBundle\Form;

use FormularioBundle\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TaskType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('description');

        $builder->add('tags', CollectionType::class, array(
            'entry_type' => TagType::class,
            'allow_add' => true,
            'by_reference' => false,
            'allow_delete' => true,
        ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Task::class,
        ));
    }

}
