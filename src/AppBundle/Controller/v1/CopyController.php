<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Copy;

class CopyController extends RESTParentController
{

    public function __construct()
    {
        parent::__construct('CopyController', 'Copy', 'CopyType');
    }

	public function getCopiesAction()
	{
		return parent::getAll();
	}

	public function getCopyAction($id)
	{
		return parent::getOne($id);
	}

	public function postCopyAction(Request $request)
	{
        return parent::post($request);   
	}

    public function patchCopyAction(Request $request, $id)
    {
        return parent::patch($request, $id);  
    }

    public function deleteCopyAction($id)
    {
        return parent::delete($id);
    }

}