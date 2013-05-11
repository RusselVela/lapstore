function confirmarEliminacionCategoria(id){
    if(window.confirm("Esta seguro que desea elimiar esta Categoria y todos sus productos?")){
        window.location ="adm_categoria_lista.php?categoriaId="+id;
        return true;
    }
    else{
        return false;
    }
}
function confirmarEliminacionProducto(id){
    if(window.confirm("Esta seguro que desea elimiar este Producto?")){
        window.location ="adm_producto_lista.php?productoId="+id;
        return true;
    }
    else{
        return false;
    }
}
function confirmarEliminacionUsuario(id){
    if(window.confirm("Esta seguro que desea elimiar este Usuario y todos sus post?")){
        window.location ="adm_usuarios_lista.php?usuarioId="+id;
        return true;
    }
    else{
        return false;
    }
}
function confirmarEliminacion(){
    if(window.confirm("Esta seguro que desea continuar con la Eliminación")){
        return true;
    }
    else{
        return false;
    }
}
function confirmarModificacion(){
    if(window.confirm("Esta seguro que desea continuar con la Modificación")){
        return true;
    }
    else{
        return false;
    }
}
function confirmarPedido(){
    if(window.confirm("Esta seguro que desea finalizar su compra")){
        return true;
    }
    else{
        return false;
    }
}