<?php

class APIView{
    public function response($data, $status){
        header("Content-Type: application/json");//le aviso en que lenguaje se esta trabajando
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));

        // aca vamos a convertir json
        echo json_encode($data);

    }
    private function _requestStatus($code){
        $status = array(
          200 => "OK",
          404 => "Not found",
          500 => "Internal Server Error"
        );
        return (isset($status[$code]))? $status[$code] : $status[500];
    }
}