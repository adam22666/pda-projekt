<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prenajom extends CI_Controller
{
	public function read()
	{
		$this->load->library('pagination');

		$query = $this->db->get('prenajom', '5',$this->uri->segment(3));
		$data['prenajom'] = $query->result();

		$query2 = $this->db->get('prenajom');

		$config['base_url'] = 'http://localhost/pda-projekt/index.php/prenajom/read';
		$config['total_rows'] = $query2->num_rows();
		$config['per_page'] = 5;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['last_tag_open'] = '<li>';
		$config['next_tag_open'] = '<li>';
		$config['prev_tag_open'] = '<li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class=\"active\"><span><b>";
		$config['cur_tag_close'] = "</b></span></li>";

		$this->pagination->initialize($config);

		$this->load->view('prenajom/pagination',$data);
	}
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Prenajom_model');
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
		$data['prenajom'] = $this->Prenajom_model->ZobrazPrenajom();
		$data['prenajom2'] = $this->Prenajom_model->ZobrazPrenajomSpravne();
		$data['prenajom3'] = $this->Prenajom_model->ZobrazPrenajomSpravne2();
		$data['nazov'] = 'Zoznam prenájmov';
		//nahratie zoznamu prenajmu
		$this->load->view('templates/header', $data);
		$this->load->view('prenajom/index', $data);
		$this->load->view('templates/footer');
	}

	// Zobrazenie detailu o prenajme
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			$data['prenajom'] = $this->Prenajom_model->ZobrazPrenajom($id);
			$data['title'] = $data['prenajom']['sportovisko'] . ' ' . $data['prenajom']['prenajom_datum'] . ' ' . $data['prenajom']['cena€']. ' ' . $data['prenajom']['description'] . ' ' . $data['prenajom']['najomca_idnajomca'] . ' ' . $data['prenajom']['Kontakt_idKontakt'];

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('prenajom/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/prenajom');
		}
	}

	// pridanie zaznamu o prenajme
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('sportovisko', 'Pole sportovisko', 'required');
			$this->form_validation->set_rules('prenajom_datum', 'Pole prenajom_datum', 'required');
			$this->form_validation->set_rules('cena€', 'Pole cena€', 'required');
			$this->form_validation->set_rules('najomca_idnajomca', 'Pole najomca', 'required');
			$this->form_validation->set_rules('Kontakt_idKontakt', 'Pole kontakt', 'required');


			//priprava dat pre vlozenie
			$postData = array(
				'sportovisko' => $this->input->post('sportovisko'),
				'prenajom_datum' => $this->input->post('prenajom_datum'),
				'cena€' => $this->input->post('cena€'),
				'description' => $this->input->post('description'),
				'najomca_idnajomca' => $this->input->post('najomca_idnajomca'),
				'Kontakt_idKontakt' => $this->input->post('Kontakt_idKontakt'),
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Prenajom_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o prenájme bol úspešne vložený');
					redirect('/prenajom');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['post'] = $postData;
		$data['najomca'] = $this->Prenajom_model->NaplnDropdownNajomca();
		$data['kontakt'] = $this->Prenajom_model->NaplnDropdownKontakt();
		$data['vybrany_najomca'] = '';
		$data['vybrany_kontakt'] = '';
		$data['title'] = 'Pridať prenájom';
		$data['action'] = 'add';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('prenajom/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o prenájme
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Prenajom_model->ZobrazPrenajom($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('sportovisko', 'Pole sportovisko', 'required');
			$this->form_validation->set_rules('prenajom_datum', 'Pole prenajom_datum', 'required');
			$this->form_validation->set_rules('cena€', 'Pole cena€', 'required');
			$this->form_validation->set_rules('najomca_idnajomca', 'Pole najomca', 'required');
			$this->form_validation->set_rules('Kontakt_idKontakt', 'Pole kontakt', 'required');


			// priprava dat pre aktualizaciu
			$postData = array(
				'sportovisko' => $this->input->post('sportovisko'),
				'prenajom_datum' => $this->input->post('prenajom_datum'),
				'cena€' => $this->input->post('cena€'),
				'description' => $this->input->post('description'),
				'najomca_idnajomca' => $this->input->post('najomca_idnajomca'),
				'Kontakt_idKontakt' => $this->input->post('Kontakt_idKontakt'),
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Prenajom_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'Záznam o prenájme bol aktualizovaný.');
					redirect('/prenajom');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}


		$data['najomca'] = $this->Prenajom_model->NaplnDropdownNajomca();
		$data['kontakt'] = $this->Prenajom_model->NaplnDropdownKontakt();
		$data['vybrany_najomca'] = $postData['id'];
		$data['vybrany_kontakt'] = $postData['id'];
		$data['post'] = $postData;
		$data['title'] = 'Aktualizovať údaje';
		$data['action'] = 'edit';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('prenajom/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat o prenájme
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Prenajom_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/prenajom');
	}
}
