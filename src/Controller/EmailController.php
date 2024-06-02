<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmailController extends AbstractController
{
    #[Route('/email', name: 'emails')]
    public function index(MailerInterface $mailer): Response
    {
        // Construction de l'objet mail
        $email = new TemplatedEmail();
        $email->from('Service Client<fahamygaston@gmail.com>')
            ->to('fahamygaston@hotmail.com')
            ->cc("toto@gmail.com")
            ->subject('Bienvenu chez nous !')
            ->htmlTemplate('Email/welcome.html.twig')
            ->context(
                [
                    'username' => 'Fahami'
                ]
            )
            ->attachFromPath('public/images/image_test.jpg', 'bouton-play.jpg');

        $mailer->send($email); // Envoi du mail

        return $this->render('email/index.html.twig', []);
    }
}
