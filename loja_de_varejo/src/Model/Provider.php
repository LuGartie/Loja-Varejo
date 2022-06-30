<?php

namespace APP\Model;

class Provider{
    private int $cnpj;
    private string $name;
    private Address $address;

    public function __construct(
        string $cnpj,
        string $name,
        address $address,
    )
    {
        /** inicializando propriedades*/
        $this->cnpj = $cnpj;
        $this->name = $name;
        $this->address = $address;
    }
}



    

