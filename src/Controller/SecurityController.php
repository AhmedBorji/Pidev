<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $utils) : Response
    {
        $error=$utils->getLastAuthenticationError();
        $lastUsername=$utils->getLastUsername();
        return $this->render('login_singup/login.html.twig', [
               'error' => $error, 'last_username' => $lastUsername
        ]);
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    
    }


    /**
     * @Route("/loginmobile", name="loginmob")
     */
    public function loginmobile(Request $request,NormalizerInterface $normalizer,UserPasswordEncoderInterface $encoder)
    {

        $em=$this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findOneBy([
            'email' => $request->get('email'),
        ]);
        if(!$user)
        {
            $jsonContent = $normalizer->normalize([]);
            return new Response(json_encode($jsonContent));
        }
        $this->passwordEncoder = $encoder;
        if($this->passwordEncoder->isPasswordValid($user, $request->get('pwd'))) {
            $med=$em->getRepository(User::class)->find($user->getUsername());
            $jsonContent = $normalizer->normalize($med,'json',['user'=>'post:read']);
            return new Response(json_encode($jsonContent));
        }
        else
        {
            $jsonContent = $normalizer->normalize([]);
            return new Response(json_encode($jsonContent));
        }
    }

    /**
     * @Route("/inscriptionmobile/new", name="inscriptionmob")
     */
    public function addmobuser(Request $request,NormalizerInterface $normalizer,UserPasswordEncoderInterface $encoder)
    {
        $em=$this->getDoctrine()->getManager();
        $user= new User();
        $user->setEmail($request->get('email'));
        $user->setType(0);
        $user->setStatus(0);
        $hash = $encoder->encodePassword($user,$request->get('pwd'));
        $user->setPassword($hash);
        $user->setVerToken("tmpp");
        $user->setPasschange("None");
        $user->setRoles(['ROLE_CANDIDATE']);


        $em->persist($user);
        $em->flush();
        $jsonContent = $normalizer->normalize($user,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }


}
