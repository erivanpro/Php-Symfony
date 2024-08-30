<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Produit;
use App\Entity\Distributeur;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;

class ListeProduitsController extends AbstractController
{
    /**
     * @Route("/liste", name="liste")
     */
    public function index()
    {

        $em=$this->getDoctrine()->getManager();
        $produitsRepository=$em->getRepository(Produit::class);
        
        $listeProduits=$produitsRepository->orderingProduit();

        $lastProduit=$produitsRepository->getLastProduit();
     
        // return $this->render('liste_produits/index.html.twig', [
        //     'listeproduits' => $listeProduits,
        //     'lastproduit' => $lastProduit
        // ]);
        // cache publicly for 3600 seconds
       
        $response= $this->render('liste_produits/index.html.twig', [
                 'listeproduits' => $listeProduits,
                 'lastproduit' => $lastProduit
             ]);
             $response->headers->set(AbstractSessionListener::NO_AUTO_CACHE_CONTROL_HEADER, 'true');
             $response->setCache([
            
                'max_age'          => 600,
                's_maxage'         => 600,
                'immutable'        => true,
                'last_modified'    => new \DateTime(),
                'etag'             => 'abcdef'
            ]);
    return $response;
    }
 /**
     * @Route("/eager", name="eager")
     */
    public function eager()
    {

        $em=$this->getDoctrine()->getManager();
        $produitsRepository=$em->getRepository(Produit::class);
        
        $listeProduits=$produitsRepository->findAll();

        return $this->render('liste_produits/eager.html.twig', [
            'listeproduits' => $listeProduits,
       
        ]);
    }

    /**
   * distributeurs
   * @Route("/distrib",name="distributeurs")
   */
  public function listedistributeur()
  {

    $em=$this->getDoctrine()->getManager();
    $repositoryDistributeurs=$em->getRepository(Distributeur::class);
    $distributeurs = $repositoryDistributeurs->findAll();

    return $this->render('liste_produits/distributeurs.html.twig', array(
        'distributeurs' => $distributeurs));


 }

  /**
    * @Route("/apitest", name="apitest")
    */
    public function apiTest(Request $request)
    {
        
        
        $em=$this->getDoctrine()->getManager();
        $produitsRepository=$em->getRepository(Produit::class);
        $listeProduits=$produitsRepository->findAll();
        $resultat=[];
        foreach($listeProduits as $produit){

            array_push($resultat, $produit->getNom());

        }
            $reponse=new JsonResponse($resultat);
     
       
        return $reponse;

    }
}
