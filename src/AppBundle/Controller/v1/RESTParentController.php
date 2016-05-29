<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Form\FormStrongValidator;

class RESTParentController extends FOSRestController
{
    //Error messages
    protected $accessErrorMsg = "Data base access error.";

    protected $insertErrorMsg = "Data base insert error.";
    protected $updateErrorMsg = "Data base update error.";
	protected $deleteErrorMsg = "Data base delete error.";

    protected $noListFoundMsg = "No list found";
    protected $noItemFoundMsg = "No item found";

    protected $productionFormBasicError = "This formulary is not valid";
    protected $basicFormErrorsText = "Your formulary has the following errors: ";

    //Children class attributes
    protected $className;
    protected $entityName;
    protected $formName;

    public function __construct($className, $entityName, $formName)
    {
        $this->className = $className;
        $this->entityName = $entityName;
        $this->formName = $formName;

        $this->fullEntityName = $this->getFullEntityName($entityName);
        $this->fullFormName = $this->getFullFormName($formName);
    }

	public function getAll()
	{
		try{
            $repository = $this->getEntityRep($this->entityName);
			$items = $repository->findAll();
		} catch (\Exception $e) {
			$this->get('logger')->error($e->getMessage(), array("TRACE ERROR: ".__METHOD__));
			throw new HttpException(500, $this->accessErrorMsg);
		}
		if(!$items){
        	throw new HttpException(404, $this->noListFoundMsg);
        }

        return $this->returnView($items, 200);
	}

	public function getOne($item)
	{
        if(!$item){
            throw new HttpException(404, $this->noItemFoundMsg);
        }

        return $this->returnView($item, 200);
	}

    public function getAllWhere($item, $filters)
    {
        try{
            $repository = $this->getEntityRep($this->entityName);
            $items = $repository->findBy($filters);
        } catch (\Exception $e) {
            $this->get('logger')->error($e->getMessage(), array("TRACE ERROR: ".__METHOD__));
            throw new HttpException(500, $this->accessErrorMsg);
        }

        if(!$items){
            throw new HttpException(404, $this->noListFoundMsg);
        }
        
        return $this->returnView($items, 200);
    }


	public function post(Request $request)
	{
        $validItem = $this->validateWithForm(new $this->fullEntityName, $request);

    	$this->persistItem($validItem);

        return $this->returnView($validItem, 201);   
	}

	public function patch(Request $request, $item)
	{	
        if(!$item){
            throw new HttpException(404, $this->noItemFoundMsg);
        }

    	$validItem = $this->validateWithForm(new $this->fullEntityName, $request, true);

        $this->updateItem($validItem);

        return $this->returnView($validItem, 200);

	}

	public function delete($item)
	{
        if(!$item){
            throw new HttpException(404, $this->noItemFoundMsg);
        }

        try{
            $em = $this->getDoctrine()->getManager();
            $em->remove($item);
            $em->flush();
        } catch (HttpException $e) {
            $this->get('logger')->error($e->getMessage(), array("TRACE ERROR: ".__METHOD__));
            throw $e;
        } catch (\Exception $e) {
            $this->get('logger')->error($e->getMessage(), array("TRACE ERROR: ".__METHOD__));
            throw new HttpException(500, $e->getCode());
        }

        return $this->returnView("", 204);
	}


//////////////////////////////////////////////////////////////////
    protected function returnView($data, $code)
    {

        $view = $this->view($data, $code);
        return $this->handleView($view);
    }


    protected function validateWithForm($classInstance, $request, $patch = false)
    {

        if($patch){
            $form = $this->createForm($this->fullFormName, $classInstance, array('method' => 'PATCH'));
        }else {
            $form = $this->createForm($this->fullFormName, $classInstance);
        }

        $form->handleRequest($request);
        
        if(!$form->isValid()){

            if($form->getErrors(true)->count() != 0){
                $msg = $form->getErrors(true);
            }else{
                $kernel = $this->get('kernel');

                if($kernel->getEnvironment() != 'prod'){
                    $validator = new FormStrongValidator($form);
                    $msg = $validator->getHiddenErrors();
                }else{
                    $msg = $this->productionFormBasicError;
                }
                
            }

            throw new HttpException(400, $this->basicFormErrorsText . $msg);
        }

        return $classInstance;
    }

    protected function persistItem($validItem)
    {

        try{
            $em = $this->getDoctrine()->getManager();
            $em->persist($validItem);
            $em->flush();
        } catch (HttpException $e) {
            $this->get('logger')->error($e->getMessage(), array("TRACE ERROR: ".__METHOD__));
            throw $e;
        } catch (\Exception $e) {
            $this->get('logger')->error($e->getMessage(), array("TRACE ERROR: ".__METHOD__));
            throw new HttpException(500, $this->insertErrorMsg);
        } 
    }

    protected function updateItem($validItem)
    {

        try{
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        } catch (HttpException $e) {
            $this->get('logger')->error($e->getMessage(), array("TRACE ERROR: ".__METHOD__));
            throw $e;
        } catch (\Exception $e) {
            $this->get('logger')->error($e->getMessage(), array("TRACE ERROR: ".__METHOD__));
            throw new HttpException(500, $this->updateErrorMsg);
        } 
    }

    protected function getEntityRep($entity)
    {

        return $this->getDoctrine()->getRepository($this->getFullEntityName($entity));
    }

    private function getFullEntityName($entity)
    {
        if(!$entity){
            return '';
        }
        return 'AppBundle\Entity\\' . $entity;
    }

    private function getFullFormName($form)
    {
        if(!$form){
            return '';
        }

        return 'AppBundle\Form\\' . $form;
    }
}