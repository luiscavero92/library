<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Patch;


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

    /**
     * @Post("/admin/copies")
     */
	public function postCopyAction(Request $request)
	{
        $validItem = $this->validateWithForm(new $this->fullEntityName, $request);

        if(!$validItem->getAddedOn()){
            $validItem->setAddedOn(new \DateTime());
        }
        
        $this->persistItem($validItem);

        return $this->returnView($validItem, 201);  
	}

    /**
     * @Patch("/admin/copies/{id}")
     */
    public function patchCopyAction(Request $request, $id)
    {
        return parent::patch($request, $id);  
    }

    /**
     * @Delete("/admin/copies/{id}")
     */
    public function deleteCopyAction($id)
    {
        return parent::delete($id);
    }

}