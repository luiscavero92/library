<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;

class ReaderController extends RESTParentController
{

    public function __construct()
    {
        parent::__construct('ReaderController', 'Reader', 'ReaderType');
    }

	public function getReadersAction()
	{
		return parent::getAll();
	}

	public function getReaderAction($id)
	{
		return parent::getOne($id);
	}

	public function postReadersAction(Request $request)
	{
        return parent::post($request);   
	}

    public function patchReadersAction(Request $request, $id)
    {
        return parent::patch($request, $id);  
    }

    public function deleteReadersAction($id)
    {
        return parent::delete($id);
    }

}