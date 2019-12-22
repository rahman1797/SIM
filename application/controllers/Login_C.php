<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_C extends CI_Controller {

   function __Construct(){
        parent ::__construct();
        $this->load->model('M_user');
    }

    function index(){
        $this->load->view('login');
    }

	function exeLogin(){
        $NIM = $this->input->post('user_NIM');
        $pass = $this->input->post('user_pass');
        $where = array(
            'user_NIM' => $NIM,
            'user_pass' => $pass
            );

        $cek2 = $this->M_user->cekLogin("user_tbl",$where);
        $cek = $this->M_user->cekLogin("user_tbl",$where)->num_rows();
         
        if($cek > 0){
           foreach ($cek2->result() as $sess ) {
            	$sess_data['logged_in'] = 'Sudah Masuk';
                $sess_data['user_ID'] = $sess->user_ID;
                $sess_data['user_nama'] = $sess->user_nama;
                $sess_data['user_NIM'] = $sess->user_NIM;             
                $sess_data['user_prodi'] = $sess->id_prodi;
                $sess_data['user_posisi'] = $sess->id_posisi;
                $sess_data['user_opmawa'] = $sess->id_opmawa;
                $sess_data['user_departemen'] = $sess->id_departemen;
                $sess_data['user_tahun'] = $sess->user_tahun;
                $sess_data['user_role'] = $sess->user_role;
        
            }
                $this->session->set_userdata($sess_data);
                
                if ($_SESSION['user_role'] == 0) {
                    echo "dosen";
                }
                else {
                    echo "sukses";    
                }
                

            }

        }
        
        function exeLogout() {
            $this->session->sess_destroy();
            redirect(base_url('Login_C'));
        }

    }