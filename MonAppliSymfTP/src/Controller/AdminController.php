<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Entity\Produit;
use App\Form\ProduitType;

/** @Route("/admin") 
 * 
 * 
 * 
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/insert", name="insert")
     */
    public function insert(Request $request)
 {

   $produit=new Produit;
   $formProduit= $this->createForm(ProduitType::class,$produit);
   $formProduit->add('creer', SubmitType::class,array(
                    'label'=>'Insertion d\'un produit',
                    'validation_groups'=>array('registration','all')
                             
                ));

     $formProduit->handleRequest($request);

   if($request->isMethod('post') && $formProduit->isValid() ){
                        
          $em=$this->getDoctrine()->getManager();
          $file = $formProduit['lienImage']->getData();
           
          if(!is_string($file)){

                $filename=$file->getClientOriginalName();
                $file->move(
              		$this->getParameter('images_directory'),
                        $filename
                        );

                $produit->setLienImage($filename);

          } else {
               
		     $session=$request->getSession();
               $session->getFlashBag()->add('message',
                'Vous devez choisir une image pour le produit');
                $session->set('statut','danger');

       return $this->redirect($this->generateUrl('insert'));
                
       }
          $em->persist($produit);
                         
          $em->flush();
          $session=$request->getSession();
          $session->getFlashBag()->add('message','un nouveau produit a été ajouté');
          $session->set('statut','success');
          return $this->redirect($this->generateUrl('liste'));
   }
  return $this->render('Admin/create.html.twig',
		     array('my_form'=>$formProduit->createView()));   
}
    /**
     * @Route("/update/{id}", name="update")
     */
    public function update(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $produitRepository=$em->getRepository(Produit::class);
        $produit=$produitRepository->find($id);

        $img=$produit->getLienImage();
        

        $formProduit= $this->createForm(ProduitType::class,$produit);
        
        // ajoute un bouton submit
        
        $formProduit->add('creer', SubmitType::class,array(
            'label'=>'Mise à jour d\'un film',
            'validation_groups'=>array('all')    
        ));
         $formProduit->handleRequest($request);
        
         if($request->isMethod('post') && $formProduit->isValid() ){
           
            // insertion dans la base
           
          $file = $formProduit['lienImage']->getData();
      
		if(!is_string($file)){
      
            $filename=$file->getClientOriginalName();
            $file->move(
                    $this->getParameter('images_directory'),
                    $filename
                    );
            $produit->setLienImage($filename);
            } else {
                
                $produit->setLienImage($img);
            }
            $em->persist($produit);                        
            $em->flush();
            $session=$request->getSession();
            $session->getFlashBag()->add('message','le produit a été mis à jour');
            $session->set('statut','success');
            return $this->redirect($this->generateUrl('liste'));
     }
    return $this->render('Admin/create.html.twig',
               array('my_form'=>$formProduit->createView()));  

}
/**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $produitRepository=$em->getRepository(Produit::class);
        $produit=$produitRepository->find($id);
        $em->remove($produit);
        $em->flush();
        $session=$request->getSession();
        $session->getFlashBag()->add('message','Le produit a été supprimé');
        $session->set('statut','success');
        return $this->redirect($this->generateUrl('liste'));
    }

}