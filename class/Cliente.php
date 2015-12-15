<?php
require "interfaces/ClientRateInterface.php";
require "interfaces/CustomBillingAdressInterface.php";

class Cliente implements ClientRateInterface, CustomBillingAdressInterface
{

    private $nome,$endereco,$cpf, $pessoa, $rate, $customBillingAdress;


    /**
     * Set client rate
     * @param $rate (1-5)
     */
    function setClientRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * Set client rate
     * @param $rate (1-5)
     */
    function getClientRate()
    {
        return $this->rate;
    }


    /**
     * @param $adress
     */
    function setCustomBillingAdress($adress)
    {
        $this->customBillingAdress = $adress;
    }

    /**
     * @return mixed
     */
    function getCustomBillingAdress()
    {
        return $this->customBillingAdress;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     * @return Cliente
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     * @return Cliente
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * @param mixed $pessoa
     */
    public function setPessoa($pessoa)
    {
        return $this->pessoa = $pessoa;
    }


    /**
     * Generate random clients
     *
     * @param $qt
     * @return mixed
     */
    public static function generateRandomClients($qt){
        for ($i = 0; $i < $qt; $i++) {
            $clientes[$i] = new Cliente();
            $randPessoa = rand(0,1);
            $clientes[$i]->setNome("Cliente" . $i)->setEndereco("Rua" . rand(1, 200))->setCpf(rand(1, 5000000000))->setPessoa($randPessoa);
            if ($i%2 == 0){
                $clientes[$i]->setClientRate(rand(1,5));
            }else{
                $clientes[$i]->setCustomBillingAdress("Rua ".rand(1,30));
            }
        }
        return $clientes;
    }


    /**
     * Ordenate an array
     *
     * @param $clientes
     * @return mixed
     */
    public static function getArraySequence($clientes){
        if(!empty($_GET['sort'])){
            if($_GET['sort'] == 'desc'){
                krsort($clientes);

                return $clientes;
            }

            if($_GET['sort'] == 'asc'){
                ksort($clientes);
                return $clientes;
            }
        }else{
            return $clientes;
        }
    }
}
