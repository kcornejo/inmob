<?php 
  class RegistroRemesa {
   /**
    * @var string
    */
    public $ID_INTEGRACION;
    /**
    * @var string
    */
    public $ID_INTERNO;
    /**
    * @var string
    */
    public $ID_OPERACION;
    /**
    * @var string
    */
    public $CORRELATIVO_ID;
    /**
    * @var string
    */
    public $REM_PRIMER_NOMBRE;
    /**
    * @var string
    */
    public $REM_SEGUNDO_NOMBRE;
    /**
    * @var string
    */
    public $REM_PRIMER_APELLIDO;
    /**
    * @var string
    */
    public $REM_SEGUNDO_APELLIDO;
    /**
    * @var string
    */
    public $REM_PAIS;
        /**
    * @var string
    */
    public $REM_ESTADO;
    /**
    * @var string
    */
    public $REM_CIUDAD;
    /**
    * @var string
    */
    public $REM_DIRECCION;
    /**
    * @var string
    */
    public $BEN_PRIMER_NOMBRE;
    /**
    * @var string
    */
    public $BEN_SEGUNDO_NOMBRE;
    /**
    * @var string
    */
    public $BEN_PRIMER_APELLIDO;
    /**
    * @var string
    */
    public $BEN_SEGUNDO_APELLIDO;
    /**
    * @var string
    */
    public $BEN_TELEFONO;
    /**
    * @var string
    */
    public $BEN_PAIS;
    /**
    * @var string
    */
    public $MONEDA_ORIGEN;
    /**
    * @var string
    */
    public $MONEDA_PAGO;    
    /**
    * @var string
    */
    public $VALOR_ENVIADO;   
        /**
    * @var string
    */
    public $VALOR_PAGAR;   
        /**
    * @var string
    */
    public $ESTADO_GIRO;   
        /**
    * @var string
    */
    public $OBSERVACIONES;   
    
    public function __construct($ID_INTEGRACION, 
                                $ID_INTERNO,
                                $ID_OPERACION,
                                $CORRELATIVO_ID,
                                $REM_PRIMER_NOMBRE,
                                $REM_SEGUNDO_NOMBRE,
                                $REM_PRIMER_APELLIDO,
                                $REM_SEGUNDO_APELLIDO,
                                $REM_PAIS,
                                $REM_ESTADO, 
                                $REM_CIUDAD,
                                $REM_DIRECCION,
                                $BEN_PRIMER_NOMBRE, 
                                $BEN_SEGUNDO_NOMBRE,
                                $BEN_PRIMER_APELLIDO, 
                                $BEN_SEGUNDO_APELLIDO,
                                $BEN_TELEFONO,
                                $BEN_PAIS,
                                $MONEDA_ORIGEN,
                                $MONEDA_PAGO,
                                $VALOR_ENVIADO,
                                $VALOR_PAGAR,
                                $ESTADO_GIRO,
                                $OBSERVACIONES
                                ) {
    $this->ID_INTEGRACION     = $ID_INTEGRACION;
    $this->ID_INTERNO         = $ID_INTERNO;
    $this->ID_OPERACION       = $ID_OPERACION;
    $this->CORRELATIVO_ID     = $CORRELATIVO_ID;
    $this->REM_PRIMER_NOMBRE     = $REM_PRIMER_NOMBRE;
    $this->REM_SEGUNDO_NOMBRE  = $REM_SEGUNDO_NOMBRE;
    $this->REM_PRIMER_APELLIDO   = $REM_PRIMER_APELLIDO;
    $this->REM_SEGUNDO_APELLIDO   = $REM_SEGUNDO_APELLIDO;
    $this->REM_PAIS=$REM_PAIS;
    $this->REM_ESTADO =$REM_ESTADO;
    $this->REM_CIUDAD =$REM_CIUDAD;
    $this->REM_DIRECCION =$REM_DIRECCION;
    $this->BEN_PRIMER_NOMBRE =$BEN_PRIMER_NOMBRE;
    $this->BEN_SEGUNDO_NOMBRE =$BEN_SEGUNDO_NOMBRE;
    $this->BEN_PRIMER_APELLIDO =$BEN_PRIMER_APELLIDO;
    $this->BEN_SEGUNDO_APELLIDO=$BEN_SEGUNDO_APELLIDO;
    $this->BEN_TELEFONO =$BEN_TELEFONO;
    $this->BEN_PAIS =$BEN_PAIS;
    $this->MONEDA_ORIGEN=$MONEDA_ORIGEN;
    $this->MONEDA_PAGO =$MONEDA_PAGO;
    $this->VALOR_ENVIADO =$VALOR_ENVIADO;
    $this->VALOR_PAGAR =$VALOR_PAGAR;
    $this->ESTADO_GIRO =$ESTADO_GIRO;
    $this->OBSERVACIONES =$OBSERVACIONES;

   }
}


