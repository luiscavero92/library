<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Patch;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpKernel\Exception\HttpException;

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

    /**
     * @Post("/admin/readers")
     */
	public function postReadersAction(Request $request)
	{
        return parent::post($request);   
	}

    /**
     * @Patch("/admin/readers/{id}")
     */
    public function patchReadersAction(Request $request, $id)
    {
        return parent::patch($request, $id);  
    }
    /**
     * @Delete("/admin/readers/{id}")
     */
    public function deleteReadersAction($id)
    {
        return parent::delete($id);
    }

    /**
     * @Get("/access/{credentials}")
     */
    public function getAccessAction($credentials)
    {
        $decoded = base64_decode($credentials);

        $splitted = preg_split('/:/', $decoded);

        $username = $splitted[0];
        $password = $splitted[1];

        $reader = $this->getEntityRep($this->entityName)->findOneByUsername($username);
        if(!$reader){
            throw new HttpException(404, 'Invalid credentials');
        }

        $encoder = $this->container->get('security.password_encoder');
        $validPassword = $encoder->isPasswordValid($reader, $password);
        if(!$validPassword){
            throw new HttpException(404, 'Invalid credentials');
        }
        return parent::getOneWhere(["username" => $username]);
    }

}