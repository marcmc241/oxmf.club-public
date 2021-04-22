<?PHP
    header ("Cache-Control: no-cache"); 
    header ("Pragma: no-cache");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

    header('Content-Type: application/json');

    require_once("checktkn.php");
    require_once("conexion_PDO.php");
    
    $lim=trim($_GET['lim']);
    if (is_numeric($lim)) {
    
    } else {
        print '{"result":"false","msg": "Parámetros incorrectos"}';
        exit();
    }
    $db = new Conexion();
    $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    $dbTabla="Producto, Oferta, Tienda, Colores, TipoOferta, Envio, Garantia, Comentarios";
    $consulta = "SELECT Oferta.Ido, Producto.Idp, Producto.nombrep, Producto.foto, Producto.descripcion, Oferta.fechap, Oferta.fprogram, Oferta.precioH, Oferta.precioO, Oferta.cupon, Oferta.bitlink, Tienda.nombre AS Tienda, Colores.nombre AS Color, TipoOferta.texto AS tipooferta, Envio.nombre AS enviop, Envio.emoji AS envioe, Garantia.nombre AS garantiap, Garantia.emoji AS garantiae, Comentarios.texto AS com, Oferta.com2, Oferta.estado, Oferta.telegramid FROM $dbTabla WHERE Producto.Idp=Oferta.producto AND Oferta.tienda=Tienda.Idt AND Oferta.color=Colores.Idcolor AND Oferta.tipooferta=TipoOferta.IdTipoOf AND Oferta.envio=Envio.IdEnvio AND Oferta.garantia=Garantia.IdGarantia AND Oferta.comentario=Comentarios.Idcomentario AND Producto.activo=1 AND Oferta.estadistica=1 AND (Oferta.estado=2 || Oferta.estado=4) ORDER BY GREATEST(Oferta.fechap, COALESCE(Oferta.fprogram,'1000-01-01')) DESC LIMIT 0,:l";
    $result = $db->prepare($consulta);
    if($result->execute(array(":l" => $lim))){
        
    }else{
        print '{"result":"false","msg": "Error recopilando ofertas"}';
        exit();
    }

    $ofertas = array();

    foreach ($result as $oferta){
        $offset=new DateTime();
        $fecha=$oferta['fechap'].$offset->format('O');
        if ($oferta['fechap'] < $oferta['fprogram']) {
            $fecha=$oferta['fprogram'].$offset->format('O');
        }
        $of = array('Ido' => $oferta['Ido'],
                    'nombrep' => $oferta['nombrep'],
                    'foto' => $oferta['foto'],
                    'fechap' => $fecha,
                    'precioO' => $oferta['precioO'],
                    'envio' => $oferta['enviop'],
                    'envioemoji' => $oferta['envioe'],
                    'garantia' => $oferta['garantiap'],
                    'garantiaemoji' => $oferta['garantiae'],
                    'com' => $oferta['com'],
                    'estado' => $oferta['estado']
                );
        array_push($ofertas, $of);
    }
    echo '{"result":"true","ofertas":';
    echo json_encode($ofertas);
        echo '}';
    $db=NULL;

      

?>