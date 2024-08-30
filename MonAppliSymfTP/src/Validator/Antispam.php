<?php
namespace App\Validator;
use Symfony\Component\Validator\Constraint;

/**
 * 
 * @Annotation
 * 
 */
class Antispam extends Constraint
{

   public $message="Votre champ est trop court";



}