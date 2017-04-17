<?php

namespace FormularioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use FormularioBundle\Entity\Competencia;
use Doctrine\ORM\EntityManager;

class PerfilCompetenciaType extends AbstractType {

//     private $em;
//
//    public function __construct(EntityManager $entityManager) {
//        $this->em = $entityManager;
//    }
//    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
//                ->add('competenciaId', ChoiceType::class, array(
//                    'choices' => $this->em->getRepository('FormularioBundle:Competencia')->getCompetencias($this->em),
//                    'required' => false,
//                    'attr' => array(
//                        'style' => "padding:0",
//                        'class' => 'form-control input-sm',
//                        'aria-describedby' => 'sizing-addon3'
//                    ),
//                        )
//                );
                ->add('competenciaId', EntityType::class, array(
                    'class' => 'FormularioBundle:Competencia',
                    'label' => 'Competencia',
                    "attr" => array(
                        "class" => "form-control"),
                    'required' => true,
                    
        ));
               
        $builder->add('nivel', ChoiceType::class, array(
            'choices' => array(
                '' => '',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
            ),
            'required' => false,
            'attr' => array(
                'style' => "padding:0",
                'class' => "form-control input-sm",
            ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'FormularioBundle\Entity\PerfilCompetencia'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'formulariobundle_perfilcompetencia';
    }

}
