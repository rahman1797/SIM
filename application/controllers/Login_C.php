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

//controller cek akun
	public function exeLogin(){
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
                $sess_data['user_NIM'] = $sess->user_NIM;
                $sess_data['user_nama'] = $sess->user_nama;
                $sess_data['user_role'] = $sess->user_role;
                $sess_data['user_prodi'] = $sess->user_prodi;
                $sess_data['user_tahun'] = $sess->user_tahun;
                $sess_data['user_posisi'] = $sess->user_posisi;
            }
                $this->session->set_userdata($sess_data);
                echo "sukses";
            }
            else{
                echo " <script>
                         alert('NIM atau password salah!');
                         history.go(-1);
                        </script>";
            }

        }
        //**controller cek akun

        public function exeLogout() {
            $this->session->sess_destroy();
            $this->load->view('login');
        }

    }