<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\CDU;

class CDUController extends RESTParentController
{

    public function __construct()
    {
        parent::__construct('CDUController', 'CDU', '');
    }

	public function getCdusAction()
	{
		return parent::getAll();
	}

	public function getCduAction($id)
	{
		return parent::getOne($id);
	}

}