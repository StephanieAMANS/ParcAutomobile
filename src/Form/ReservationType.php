<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Site;
use App\Entity\Team;
use App\Entity\TypeCar;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('demand', TextType::class,[
                'label' => 'Demande OM ou personnelle',
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
            ->add('operationCode', TextType::class,[
                'label' => 'Code opération',
                'required' => false,
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
            ->add('teams', EntityType::class, [
                'label' => 'Section / Equipe',
                'class' => Team::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('departureDate', DateType::class,[
                'label' => 'Date de départ',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
            ->add('departureTime', TimeType::class,[
                'label' => 'Heure de départ',
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
            ->add('returnDate',DateType::class,[
                'label' => 'Date de retour',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
            ->add('returnTime',TimeType::class,[
                'label' => 'Heure de retour',
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
            ->add('sites', EntityType::class,[
                'label' => 'Site de départ',
                'class' => Site::class,
                'choice_label' => 'name',
                'multiple' =>  true,
                'expanded' => true,
            ])

            ->add('types', EntityType::class,[
                'label' => 'Sélectionnez votre voiture',
                'class' => TypeCar::class,
                'choice_label' => 'type',
                'multiple' =>  true,
                'expanded' => true,
            ])
            ->add('comments', TextareaType::class,[
                'label' => 'Commentaires ou précisions',
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
