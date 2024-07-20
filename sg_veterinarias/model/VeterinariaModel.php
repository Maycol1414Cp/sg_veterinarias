<?php
include_once "../core/ModeloBasePDO.php";
class VeterinariaModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findall()
    {
        $sql = "SELECT `id`, `dueno`, `nombre`, `mascota`, `raza`, `tratamientos`, `costo`, `fecha` FROM `sg_veterinarias`; ";
        $param = array();
        return parent::gselect($sql, $param);
    }
    public function findid($p_id)
    {
        $sql = "SELECT `id`, `dueno`, `nombre`, `mascota`, `raza`, `tratamientos`, `costo`, `fecha` 
        FROM `sg_veterinarias` 
        WHERE id = :p_id;  ";
        $param = array();
        array_push($param, [':p_id', $p_id, PDO::PARAM_INT]);
        return parent::gselect($sql, $param);
    }
    public function findpaginateall($p_filtro, $p_limit, $p_offset)
    {
        $sql = "SELECT `id`, `dueno`, `nombre`, `mascota`, `raza`, `tratamientos`, `costo`, `fecha` 
        FROM `sg_veterinarias` 
        WHERE upper(concat(IFNULL(id,''),IFNULL(dueno,''),IFNULL(nombre,''),IFNULL(mascota,''),IFNULL(raza,''),IFNULL(tratamientos,''),IFNULL(costo,''),IFNULL(fecha,''))) 
        like concat('%',upper(IFNULL(:p_filtro,'')),'%') 
        limit :p_limit
        OFFSET :p_offset  ";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        array_push($param, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($param, [':p_offset', $p_offset, PDO::PARAM_INT]);
        $var = parent::gselect($sql, $param);

        $sqlCount = "SELECT count(1) as cant FROM `sg_veterinarias` WHERE upper(concat(IFNULL(id,''),IFNULL(dueno,''),IFNULL(nombre,''),IFNULL(mascota,''),IFNULL(raza,''),IFNULL(tratamientos,''),IFNULL(costo,''),IFNULL(fecha,''))) 
        like concat('%',upper(IFNULL(:p_filtro,'')),'%');";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $param);
        $var['LENGTH'] = $var1['DATA'][0]['cant'];
        return $var;
    }
    public function insert($p_dueno, $p_nombre, $p_mascota, $p_raza, $p_tratamientos, $p_costo, $p_fecha)
    {
        $sql = "INSERT INTO `sg_veterinarias`( `dueno`, `nombre`, `mascota`, `raza`, `tratamientos`, `costo`, `fecha`) 
        VALUES (:p_dueno, :p_nombre, :p_mascota, :p_raza, :p_tratamientos, :p_costo, :p_fecha);";
        $param = array();
        array_push($param, [':p_dueno', $p_dueno, PDO::PARAM_STR]);
        array_push($param, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($param, [':p_mascota', $p_mascota, PDO::PARAM_STR]);
        array_push($param, [':p_raza', $p_raza, PDO::PARAM_STR]);
        array_push($param, [':p_tratamientos', $p_tratamientos, PDO::PARAM_STR]);
        array_push($param, [':p_costo', $p_costo, PDO::PARAM_STR]);
        array_push($param, [':p_fecha', $p_fecha, PDO::PARAM_STR]);
        return parent::ginsert($sql, $param);
    }
    public function update($p_id, $p_dueno, $p_nombre, $p_mascota, $p_raza, $p_tratamientos, $p_costo, $p_fecha)
    {
        $sql = " UPDATE `sg_veterinarias` SET 
        `dueno`= :p_dueno,
        `nombre`= :p_nombre,
        `mascota`= :p_mascota,
        `raza`= :p_raza,
        `tratamientos`= :p_tratamientos,
        `costo`= :p_costo,
        `fecha`= :p_fecha 
        WHERE `id`= :p_id ";
        $param = array();
        array_push($param, [':p_id', $p_id, PDO::PARAM_INT]);
        array_push($param, [':p_dueno', $p_dueno, PDO::PARAM_STR]);
        array_push($param, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($param, [':p_mascota', $p_mascota, PDO::PARAM_STR]);
        array_push($param, [':p_raza', $p_raza, PDO::PARAM_STR]);
        array_push($param, [':p_tratamientos', $p_tratamientos, PDO::PARAM_STR]);
        array_push($param, [':p_costo', $p_costo, PDO::PARAM_STR]);
        array_push($param, [':p_fecha', $p_fecha, PDO::PARAM_STR]);
        return parent::gupdate($sql, $param);
    }
    public function delete($p_id)
    {
        $sql = "DELETE FROM `sg_veterinarias` WHERE id =:p_id";
        $param = array();
        array_push($param, [':p_id', $p_id, PDO::PARAM_INT]);
        return parent::gdelete($sql, $param);
    }
}
