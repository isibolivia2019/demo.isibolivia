<?php
require_once 'Base.php';
class Usuario{
	private $db;
	public function __construct(){
		$this->db = new Base;
	}
	
  	public function autentificacionUsuario($datos){
		$sql = "SELECT cod_usuario, nombre_usuario, appat_usuario, apmat_usuario, ci_usuario, ci_exp_usuario, genero_usuario, fec_nac_usuario,direccion_usuario, telefono_usuario, nombre_ref_usuario, telefono_ref_usuario, tipo_ref_usuario, email_usuario, pass_usuario, imagen_usuario, nombre_cargo, estado_usuario FROM usuario, cargo WHERE usuario.cod_cargo = cargo.cod_cargo and ci_usuario = ? and pass_usuario = ?;";
		return $this->db->select($sql, $datos);
	}

	public function listaUsuarioEstado($datos){
		$sql = "SELECT cod_usuario, nombre_usuario, appat_usuario, apmat_usuario, ci_usuario, ci_exp_usuario, genero_usuario, fec_nac_usuario,direccion_usuario, telefono_usuario, nombre_ref_usuario, telefono_ref_usuario, tipo_ref_usuario, email_usuario, pass_usuario, imagen_usuario, nombre_cargo, estado_usuario FROM usuario, cargo WHERE usuario.cod_cargo = cargo.cod_cargo and estado_usuario = ?;";
		return $this->db->select($sql, $datos);
	}

	public function listaUsuarioSinCargo($datos){
		$sql = "SELECT * FROM usuario";
		return $this->db->select($sql, $datos);
	}

	public function listaUsuarios($datos){
		$sql = "SELECT cod_usuario, nombre_usuario, appat_usuario, apmat_usuario, ci_usuario, ci_exp_usuario, genero_usuario, fec_nac_usuario,direccion_usuario, telefono_usuario, nombre_ref_usuario, telefono_ref_usuario, tipo_ref_usuario, email_usuario, pass_usuario, imagen_usuario, nombre_cargo, estado_usuario FROM usuario, cargo WHERE usuario.cod_cargo = cargo.cod_cargo;";
		return $this->db->select($sql, $datos);
	}

	public function listaPrivilegiosUsuarios($datos){
		$sql = "SELECT * FROM usuario_privilegios WHERE cod_usuario = ?";
		return $this->db->select($sql, $datos);
	}

	public function listaUsuariosRegistro($datos){
		$sql = "SELECT * FROM usuario WHERE registro = ? and estado_usuario = ?";
		return $this->db->select($sql, $datos);
	}

	public function listaUsuariosNotificacion($datos){
		$sql = "SELECT * FROM usuario WHERE notificacion = ? and estado_usuario = ?";
		return $this->db->select($sql, $datos);
	}

	public function usuarioEspecifico($datos){
		$sql = "SELECT cod_usuario, nombre_usuario, appat_usuario, apmat_usuario, ci_usuario, ci_exp_usuario, genero_usuario, fec_nac_usuario, direccion_usuario, telefono_usuario, nombre_ref_usuario, telefono_ref_usuario, tipo_ref_usuario, email_usuario, pass_usuario, imagen_usuario, nombre_cargo, estado_usuario, registro, notificacion FROM usuario, cargo WHERE usuario.cod_cargo = cargo.cod_cargo and cod_usuario = ?";
		return $this->db->select($sql, $datos);
	}

	public function agregarUsuario($datos){
		$sql = "INSERT INTO usuario(nombre_usuario, appat_usuario, apmat_usuario, ci_usuario, ci_exp_usuario, genero_usuario, fec_nac_usuario, direccion_usuario, telefono_usuario, nombre_ref_usuario, telefono_ref_usuario, tipo_ref_usuario, email_usuario, pass_usuario, imagen_usuario, cod_cargo, estado_usuario, registro, notificacion) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		return $this->db->insert($sql, $datos);
	}

	public function actualizarUsuario($datos){
		$sql = "UPDATE usuario SET nombre_usuario = ?, appat_usuario = ?, apmat_usuario = ?, ci_usuario = ?, ci_exp_usuario = ?, genero_usuario = ?, fec_nac_usuario = ?, direccion_usuario = ?, telefono_usuario = ?, nombre_ref_usuario = ?, telefono_ref_usuario = ?, tipo_ref_usuario = ?, email_usuario = ?, pass_usuario = ?, registro = ?, notificacion = ? WHERE cod_usuario = ?";
		return $this->db->update($sql, $datos);
	}

	public function cambiarEstado($datos){
		$sql = "UPDATE usuario SET estado_usuario = ? WHERE cod_usuario = ?";
		return $this->db->update($sql, $datos);
	}






	public function agregarPrivilegio($datos){
		$sql = "INSERT INTO usuario_privilegios(cod_usuario, itemUsuario, itemCargo, itemHorario, itemSueldo, itemProducto, itemCategoria, itemSucursal, itemAlmacen, itemReportes, itemDescuentoProductos, itemTraspasoProductos, itemProductosPerdidos, itemVentas, itemBiometrico, itemAccesos, itemCajaChica, itemCliente, itemConfiguracion, itemRegistro, itemNotificacion) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
		return $this->db->insert($sql, $datos);
	}

	public function actualizarPrivilegioItemUsuario($datos){
		$sql = "UPDATE usuario_privilegios SET itemUsuario = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemCargo($datos){
		$sql = "UPDATE usuario_privilegios SET itemCargo = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemHorario($datos){
		$sql = "UPDATE usuario_privilegios SET itemHorario = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemSueldo($datos){
		$sql = "UPDATE usuario_privilegios SET itemSueldo = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemProducto($datos){
		$sql = "UPDATE usuario_privilegios SET itemProducto = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemCategoria($datos){
		$sql = "UPDATE usuario_privilegios SET itemCategoria = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemSucursal($datos){
		$sql = "UPDATE usuario_privilegios SET itemSucursal = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemAlmacen($datos){
		$sql = "UPDATE usuario_privilegios SET itemAlmacen = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemReportes($datos){
		$sql = "UPDATE usuario_privilegios SET itemReportes = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemDescuentoProductos($datos){
		$sql = "UPDATE usuario_privilegios SET itemDescuentoProductos = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemTraspasoProductos($datos){
		$sql = "UPDATE usuario_privilegios SET itemTraspasoProductos = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemProductosPerdidos($datos){
		$sql = "UPDATE usuario_privilegios SET itemProductosPerdidos = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemVentas($datos){
		$sql = "UPDATE usuario_privilegios SET itemVentas = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemBiometrico($datos){
		$sql = "UPDATE usuario_privilegios SET itemBiometrico = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemAccesos($datos){
		$sql = "UPDATE usuario_privilegios SET itemAccesos = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemCajaChica($datos){
		$sql = "UPDATE usuario_privilegios SET itemCajaChica = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemCliente($datos){
		$sql = "UPDATE usuario_privilegios SET itemCliente = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemConfiguracion($datos){
		$sql = "UPDATE usuario_privilegios SET itemConfiguracion = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemRegistro($datos){
		$sql = "UPDATE usuario_privilegios SET itemRegistro = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}

	public function actualizarPrivilegioItemNotificacion($datos){
		$sql = "UPDATE usuario_privilegios SET itemNotificacion = ? WHERE cod_usuario  = ?";
		return $this->db->update($sql, $datos);
	}
}
?>