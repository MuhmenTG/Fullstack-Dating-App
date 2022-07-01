<?php
class Response{
    
    private $code;
    public function __construct(int $code = 200) 
    {
        $this->code = $code;
    }

    public function code(int $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function toJSON(array $input): string
    {
        //header('Content-Type: application/json');
        return json_encode($input);
    }

}