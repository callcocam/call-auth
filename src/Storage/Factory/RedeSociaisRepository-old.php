<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Model\RedeSociais;

use Base\Model\AbstractModel;
use Zend\Config\Writer\PhpArray;
use Zend\Db\TableGateway\TableGateway;
use Base\Model\AbstractRepository;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class RedeSociaisRepository extends AbstractRepository
{

    protected $providers;
    /**
     * __construct Factory Model
     *
     * @param TableGateway $tableGateway
     * @return \Auth\Model\RedeSociais\RedeSociaisRepository
     */
    public function __construct(TableGateway $tableGateway)
    {
        // Configurações iniciais do Factory Repository
        $this->tableGateway=$tableGateway;
    }

    public function insert(AbstractModel $model)
    {
        $result=parent::insert($model);
        if($result->getResult()){
            $this->gerar_provider();
        }
        return $result;
    }

    public function update(AbstractModel $model, $where = null)
    {
        $result=parent::update($model, $where);
        if($result->getResult()){
            $this->gerar_provider();
        }
        return $result;
    }

    public function delete($where)
    {
        $result=parent::delete($where);
        if($result->getResult()){
            $this->gerar_provider();
        }
        return $result;
    }

    public function gerar_provider(){

        $data=$this->findBy(['state'=>'0']);
        if($data->getResult()){
            foreach($data->getData() as $provider):
                $providers=['enabled'=>$provider->getEnabled(),'keys'=>[
                    'key'=>$provider->getKey(),'secret'=>$provider->getSecret()
                ],
                    'redirect_uri'=>$provider->getRedirectUri(),'access_type'=>$provider->getAccessType(),
                    'trustForwarded'=>$provider->getTrustforwarded(),
                    'includeEmail'=>$provider->getIncludeEmail(),'scope'=>$provider->getScope()];
                $this->providers[$provider->getProvider()]=array_filter($providers);
            endforeach;
            $writer = new PhpArray();
            file_put_contents('./config/autoload/provider.php',$writer->toString($this->providers));
        }


    }



}

