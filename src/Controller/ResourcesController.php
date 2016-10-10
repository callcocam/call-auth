<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Controller;

use Base\Controller\AbstractController;
use Interop\Container\ContainerInterface;
use Auth\Form\ResourcesFilter;
use Auth\Form\ResourcesForm;
use Auth\Model\Resources\Resources;
use Auth\Model\Resources\ResourcesRepository;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class ResourcesController extends AbstractController
{

    /**
     * __construct Factory Model
     *
     * @return __construct
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        // Configurações iniciais do Controller
        $this->containerInterface=$containerInterface;
        $this->table=ResourcesRepository::class;
        $this->model=Resources::class;
        $this->form=ResourcesForm::class;
        $this->filter=ResourcesFilter::class;
        $this->route="auth";
        $this->controller="resources";
    }


}

