<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class SecurityController extends AbstractController
{
   /**
 * @Route("/inscription", name="security_registration")
 */
 public function registration(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder )
 {
 $user = new User();
 $form = $this->createForm(RegistrationType::class, $user);
 $form->handleRequest($request);

 if($form->isSubmitted() && $form->isValid()) {
     //pour dire a symfony quell est le champs a cripté
    $hash = $encoder->encodePassword($user,$user->getPassword()); //enragister le resultat du cryptage du password
    $user->setPassword($hash);
 //l'objet $em sera affecté automatiquement grâce à l'injection des dépen
 $em->persist($user);
 $em->flush();

 }
 return $this->render('base1.html.twig',
 ['form' =>$form->createView()]);
 }

/**
* @Route("/connexion",name="security_login")
*/
public function login(AuthenticationUtils $authenticationUtils)
{
// get the login error if there is one
$error = $authenticationUtils->getLastAuthenticationError();
// last username entered by the user
$lastUsername = $authenticationUtils->getLastUsername();

return $this->render('base2.html.twig',
['lastUsername'=>$lastUsername,'error' => $error]);
}

/**
* @Route("/deconnexion",name="security_logout")
*/
public function logout()
{ }

}
