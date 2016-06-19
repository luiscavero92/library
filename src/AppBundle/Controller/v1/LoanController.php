<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Patch;


class LoanController extends RESTParentController
{

    public function __construct()
    {
        parent::__construct('LoanController', 'Loan', 'LoanType');
    }

	public function getLoansAction()
	{
		return parent::getAll();
	}

	public function getLoanAction($id)
	{
		return parent::getOne($id);
	}
    /**
     * @Post("/admin/loans")
     */
	public function postLoansAction(Request $request)
	{
        $validItem = $this->validateWithForm(new $this->fullEntityName, $request);

        $validItem->setLoanDate(new \DateTime());
        if(!$validItem->getCopy()->getAvailable()){
            throw new HttpException(400, 'This copy is not currently available');
        }
        $this->persistItem($validItem);

        return $this->returnView($validItem, 201);   
	}

    /**
     * @Patch("/admin/loans/{id}")
     */
    public function patchLoansAction(Request $request, $id)
    {
        $item = $this->getOneById($id);

        if(!$item){
            throw new HttpException(404, $this->noItemFoundMsg);
        }

        $validItem = $this->validateWithForm($item, $request, true);

        if(!$validItem->getCopy()->getAvailable()){
            throw new HttpException(400, 'This copy is not currently available');
        }
        
        $this->updateItem($validItem);

        return $this->returnView($validItem, 200); 
    }

    /**
     * @Delete("/admin/loans/{id}")
     */
    public function deleteLoansAction($id)
    {
        return parent::delete($id);
    }

}