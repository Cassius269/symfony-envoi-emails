<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmailController extends AbstractController
{
    #[Route('/email', name: 'emails')]
    public function index(MailerInterface $mailer): Response
    {
        // $transport = new EsmtpTransport('smtp.mailtrap.io', 2525);
        // $transport->setUsername('9ee42d51b4ba5f');
        // $transport->setPassword('5eafc17ac32083');
        // $mailer = new Mailer($transport);

        $email = new Email();
        $email->from('Service Client<fahamygaston@gmail.com>')
            ->to('fahamygaston@hotmail.com')
            ->subject('Bienvenu chez nous !')
            ->text('Nous sommes heureux de vous accueillir')
            ->html("<p>Bonjour</p>");

        $mailer->send($email);

        return $this->render('email/index.html.twig', []);
    }
}
