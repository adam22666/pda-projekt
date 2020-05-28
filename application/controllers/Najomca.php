<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Najomca extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Najomca_model');
	}
	public function index(){
		$data = array();

		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$data['najomca'] = $this->Najomca_model->ZobrazNajomcu();
		$data['nazov'] = 'Zoznam nájomcov';
		//nahratie zoznamu nájomcovi
		$this->load->view('templates/header', $data);
		$this->load->view('najomca/index', $data);
		$this->load->view('templates/footer');
	}

	// Zobrazenie detailu o najomcovi
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			$data['najomca'] = $this->Najomca_model->ZobrazNajomcu($id);
			$data['title'] = $data['najomca']['meno'] . ' ' . $data['najomca']['priezvisko']  . ' ' . $data['najomca']['datum_narodenia'];

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('najomca/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/najomca');
		}
	}

	// pridanie zaznamu o najomcovi
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zaznamu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('meno', 'Pole meno', 'required');
			$this->form_validation->set_rules('priezvisko', 'Pole priezvisko', 'required');
			$this->form_validation->set_rules('mesto', 'Pole mesto', 'required');
			$this->form_validation->set_rules('PSČ', 'Pole PSČ', 'required');
			$this->form_validation->set_rules('datum_narodenia', 'Pole datum_narodenia', 'required');


			//priprava dat pre vlozenie
			$postData = array(
				'meno' => $this->input->post('meno'),
				'priezvisko' => $this->input->post('priezvisko'),
				'mesto' => $this->input->post('mesto'),
				'PSČ' => $this->input->post('PSČ'),
				'datum_narodenia' => $this->input->post('datum_narodenia'),

			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Najomca_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o nájomcovi bol úspešne vložený');
					redirect('/najomca');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Pridať nájomcu';
		$data['action'] = 'add';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('najomca/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o nájomcovi
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Najomca_model->ZobrazNajomcu($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('meno', 'Pole meno', 'required');
			$this->form_validation->set_rules('priezvisko', 'Pole priezvisko', 'required');
			$this->form_validation->set_rules('mesto', 'Pole mesto', 'required');
			$this->form_validation->set_rules('PSČ', 'Pole PSČ', 'required');
			$this->form_validation->set_rules('datum_narodenia', 'Pole datum_narodenia', 'required');



			// priprava dat pre aktualizaciu
			$postData = array(
				'meno' => $this->input->post('meno'),
				'priezvisko' => $this->input->post('priezvisko'),
				'mesto' => $this->input->post('mesto'),
				'PSČ' => $this->input->post('PSČ'),
				'datum_narodenia' => $this->input->post('datum_narodenia'),

			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Najomca_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'Záznam o nájomcovi bol aktualizovaný.');
					redirect('/najomca');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}

		//$data['users'] = $this->Temperatures_model->get_users_dropdown();
		//	$data['users_selected'] = $postData['user'];
		$data['post'] = $postData;
		$data['title'] = 'Aktualizovať údaje';
		$data['action'] = 'edit';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('najomca/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat o nájomcovi
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Najomca_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/najomca');
	}
}
