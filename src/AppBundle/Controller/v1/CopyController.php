<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;

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
        $validItem = $this->validateWithForm(new $this->fullEntityName, $request);

        if(!$validItem->getAddedOn()){
            $validItem->setAddedOn(new \DateTime());
        }
        
        $this->persistItem($validItem);

        return $this->returnView($validItem, 201);  
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