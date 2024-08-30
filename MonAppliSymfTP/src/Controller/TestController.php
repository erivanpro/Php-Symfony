<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Contracts\Translation\TranslatorInterface;
use Psr\Log\LoggerInterface;
use App\Service\MessageGenerator;

class TestController extends AbstractController
{

   
    /**
     * @Route("/mylog")
     */
    public function list(LoggerInterface $logger)
    {
        $logger->info('Et voili volou! j\'utilise le service loggerInterface !');
        return new Response('ok');
       
    } 

     /**
     * @Route("/message")
     */
    public function message(MessageGenerator $message)
    {
        return new Response($message->getHappyMessage());
    
       
    } 

    /**
     * @Route("/test", name="test",  methods={"GET","POST"})
     */
    public function index(Request $request)
    {
        $session = $request->getSession();
        $session->getFlashBag()->add('message', 'message informatif');
        $session->getFlashBag()->add('message', 'message complémentaire');
        $session->set('statut', 'primary');
        // $session->set('auteur','rocamora');
        //  $url = $this->generateUrl('redirection');
        //         return $this->redirect($url);
        return $this->render('test/index.html.twig');   
    }
    

    /**
     * @Route("/redirection", name="redirection")
     */
    public function redirection(Request $request)
    {
        // recuperation de la session
        $session = $request->getSession();
        $info=$session->getFlashBag()->get('info');
        $affiche='';
        foreach($info as $message){

            $affiche.=$message.'<br>';
        }
       
      
        return new Response("message: $affiche");
    }

    /**
    * @Route("/langue/{_locale}", name="langue",requirements={"_locale"="en|fr|de"})
    */
    public function langue(Request $request,TranslatorInterface $translator)
    {
       
        
      
        return $this->render('test/index.html.twig');   

    }

     /**     
     * @Route("/hello/{age}/{nom}/{prenom}",name="hello", requirements={"nom"="[a-z]{2,50}"})
     */
    public function hello(Request $request, int $age, $nom, $prenom='')
    {
    
        return $this->render('test/hello.html.twig', [
            'nom' => $nom,
            'prenom' => $prenom,
          'age' => $age,
          'messageHtml'=>'<h3>je vais tester raw</h3>',
          'monTableau'=> [ 'profession'=>'formateur', 
				   'sexe'=>'M', 
				   'specialité'=>'Symfony']	    
        ]);
    }

}
