// JavaScript Document

    function verDetalleProducto(productoId){
	var v_detalleProducto= window.open('verProducto.php?productoId='+productoId,'Detalle producto','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=800,height=600');
	v_detalleProducto.focus();
    }
    
    function cerrarDetalle(){
        window.close()
    } 