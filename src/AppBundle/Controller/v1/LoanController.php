<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;

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

	public function postLoansAction(Request $request)
	{
        $validItem = $this->validateWithForm(new $this->fullEntityName, $request);

        $validItem->setLoanDate(new \DateTime());

        $this->persistItem($validItem);

        return $this->returnView($validItem, 201);   
	}

    public function patchLoansAction(Request $request, $id)
    {
        return parent::patch($request, $id);  
    }

    public function deleteLoansAction($id)
    {
        return parent::delete($id);
    }

}