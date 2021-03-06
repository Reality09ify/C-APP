<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		//Añadiremos las validaciones de ls libreria
		$this->load->helper('url'); //para redireccionar paginas
		$this->load->library('form_validation');
		$this->load->model('M_usuarios');
	}
	function mis_reglas(){
		$this->form_validation->set_rules('apodo', 'Apodo', 'required|max_length[60]|min_length[3]');
		$this->form_validation->set_rules('correo', 'Correo', 'required|max_length[60]|min_length[3]|valid_email');
		$this->form_validation->set_rules('fecha', 'Fecha', 'trim');
		$this->form_validation->set_rules('tipo', 'Tipo', 'trim');
		$this->form_validation->set_rules('permisos', 'Permisos', 'trim');
	
	}
	public function index()
	{
			$data['listado'] = $this->M_usuarios->get_todos();
			$this->load->view('admin/view_usuarios.php', $data);
	}

	function get_by_id($id){
	
		$query = $this->db->where('id',$id); 
		$query = $this->db->get('usuario'); 
		return $query->result(); // retornamos lo obtenidos
		//esto funciona como un select
	}

	public function modificar($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
		if($this->input->post()){
			$this->mis_reglas();
			if($this->form_validation->run()==TRUE){
				$this->M_usuarios->edit($id);
				redirect('panel/usuarios/');	
			}else{
				$this->load->view('admin/view_add_usuarios');
			}
			}else{
				$data['datos_usuarios'] =$this->M_usuarios->get_by_id($id);
		
				if(empty($data['datos_usuarios'])){
					echo "Este personaje no existe";
				}else{
					//print_r($data['datos_categorias']);
					$this->load->view('admin/view_add_usuarios', $data);
				}
			}
		}
		
		
		
	}
	public function addAdmin($id = null){
		if($id==null or !is_numeric($id)){
			echo 'Error con el id';
			return ;
		}else{
				$data['datos_usuarios'] =$this->M_usuarios->get_by_id($id);
				if ($data['datos_usuarios'][0]->tipo==1){
					$this->M_usuarios->removeAdmin($id);
					redirect('panel/usuarios/');
				}else{
					$this->M_usuarios->setAdmin($id);
					redirect('panel/usuarios/');
				}
			
		}
	}

}
