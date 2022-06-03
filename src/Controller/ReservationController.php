<?php

namespace App\Controller;


use App\Entity\Reservation;
use App\Form\ReservationType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="new_reservation")
     */
    public function create(ManagerRegistry $managerRegistry, Request $request): Response
    {
        $reservation = new Reservation();

        $entityManager = $managerRegistry->getManager();

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();

            $this->addFlash('success', 'Votre demande de réservation de voiture a bien été prise en compte');
            return $this->redirectToRoute('new_reservation');
        }
        return $this->renderForm('reservation/create.html.twig', [
            'reservationForm' => $form,
        ]);
    }
}
