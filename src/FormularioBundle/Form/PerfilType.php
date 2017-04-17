<?php

namespace FormularioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use FormularioBundle\Entity\PerfilCompetencia;
use FormularioBundle\Form\PerfilCompetenciaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PerfilType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('id', HiddenType::class)
                ->add('codigo', TextType::class)
                ->add('nombre', TextType::class)
                ->add('objetivo', TextareaType::class)
                ->add('tareas', TextareaType::class)
//                ->add('competencias', TextType::class)
                ->add('perfilCompetencias', CollectionType::class, array(
                    'entry_type' => PerfilCompetenciaType::class,
                    'label' => 'Items',
                    'allow_add' => true,
                    'by_reference' => false,
                    'allow_delete' => true,
                ))
                ->add('save', SubmitType::class);

//        $builder->add('perfilCompetencias', CollectionType::class, array(
//            'entry_type' => PerfilCompetenciaType::class,
//            'label' => 'Items',
//            'allow_add' => true,
//            'by_reference' => false,
//            'allow_delete' => true,
//        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'FormularioBundle\Entity\Perfil'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'formulariobundle_perfil';
    }

}
