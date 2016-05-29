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

	public function getCopyAction(Copy $copy = null)
	{
		return parent::getOne($copy);
	}

	public function postCopyAction(Request $request)
	{
        return parent::post($request);   
	}

    public function patchCopyAction(Request $request, Copy $copy = null)
    {
        return parent::patch($request, $copy);  
    }

    public function deleteCopyAction(Copy $copy = null)
    {
        return parent::delete($copy);
    }

}