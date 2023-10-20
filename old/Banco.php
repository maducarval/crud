<?php
class Banco{
    
    public static $usuario = "root";
    private static $senha = "";
    private static $nomeBanco = "efetivo";
    private static $host = "localhost";
    private static $conexao;

    public static function conectar()
    {
        if(Banco::$conexao){
            return Banco::$conexao;
        }
        $usuario = Banco::$usuario;
        $senha = Banco::$senha;
        $nomeBanco =  Banco::$nomeBanco;
        $host = Banco::$host;
        $connection = new PDO("mysql:host=$host; dbname=$nomeBanco;charset=utf8mb4", "$usuario", "$senha");
        Banco::$conexao = $connection;
        return $connection;
    }
    public static function desconectar()
    {
        Banco::$conexao = null;
    }

    
}
