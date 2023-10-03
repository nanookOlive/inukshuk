<?php

namespace core;

class JWT{




    public function generate(array $header,array $payload){

        //aucune chaine encodée ne doit posséder les caractères suivants
        // + => -, / =>_, = =>''
        $header=$this->cleanEncoded($this->encode($header));
        $payload=$this->cleanEncoded($this->encode($payload));
        $secret=base64_encode(apache_getenv('MY_SECRET'));
        $signature=hash_hmac('sha256',$header.'.'.$payload,$secret);
        
        return $header.'.'.$payload.'.'.$signature;

    }

    public function getHeader():string 
    {
        return $this->header;

    }
    public function getPayload():string 
    {
        return $this->payload;
    }

    public function getSignature():string
    {
        return $this->signature;
    }
   
    public function cleanEncoded(string $arg){

        return str_replace(['+','/','='],['-','_',''],$arg);
    }

    public function encode(array $arg){

        return base64_encode(json_encode($arg));
    }


    public function isValide(string $jwt)
    {

        list($header,$payload,$signatureToTest)=explode('.',$jwt);
        
        $header=json_decode(base64_decode($header),true);
        $payload=json_decode(base64_decode($payload),true);
        
        $header=$this->cleanEncoded($this->encode($header));
        $payload=$this->cleanEncoded($this->encode($payload));
        $secret=base64_encode(apache_getenv('MY_SECRET'));
        $signature=hash_hmac('sha256',$header.'.'.$payload,$secret);

        if($signatureToTest === $signature){

            return 'goody';
        }
       
    }
       
}