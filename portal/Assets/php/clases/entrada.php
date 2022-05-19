<?php

class entrada{

    protected $codigoPagina;
    protected $nombreEditor;
    protected $fecha;
    protected $titulo;
    protected $contenido;

    public function __construct($codigoPagina,$nombreEditor,$fecha,$titulo,$contenido)
    {
        $this->codigoPagina = $codigoPagina;
        $this->nombreEditor = $nombreEditor;
        $this->fecha = $fecha;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
    }


    /**
     * Get the value of contenido
     */ 
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Get the value of nombreEditor
     */ 
    public function getNombreEditor()
    {
        return $this->nombreEditor;
    }

    /**
     * Get the value of codigoPagina
     */ 
    public function getCodigoPagina()
    {
        return $this->codigoPagina;
    }
}