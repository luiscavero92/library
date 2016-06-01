<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;

class CategoryController extends RESTParentController
{

    public function __construct()
    {
        parent::__construct('CategoryController', 'Category', '');
    }

	public function getCategoriesAction()
	{
		return parent::getAll();
	}

	public function getCategoryAction($id)
	{
		return parent::getOne($id);
	}

}