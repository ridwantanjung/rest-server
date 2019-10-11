<?php

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\REST_Controller_Definitions;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Mahasiswa extends CI_Controller
{
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }
    public function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->model('Mahasiswa_model', 'mahasiswa');

        // $this->methods['index_get']['limit'] = 10;
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $mahasiswa = $this->mahasiswa->getMahasiswa();
        } else {
            $mahasiswa = $this->mahasiswa->getMahasiswa($id);
        }
        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], REST_Controller_Definitions::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Id is not exist'
            ], REST_Controller_Definitions::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Provide an id!'
            ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        } else {
            if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
                // OK
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Successfully Deleted'
                ], REST_Controller_Definitions::HTTP_NO_CONTENT);
            } else {
                // ID NOT EXIST
                $this->response([
                    'status' => false,
                    'message' => 'Id is not exits!'
                ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'srn' => $this->input->post('srn', true),
            'name' => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
            'major' => $this->input->post('major', true),
        ];

        if ($this->mahasiswa->createMahasiswa($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa has been created'
            ], REST_Controller_Definitions::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to create new data!'
            ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'srn' => $this->put('srn', true),
            'name' => $this->put('name', true),
            'email' => $this->put('email', true),
            'major' => $this->put('major', true),
        ];

        if ($this->mahasiswa->updateMahasiswa($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data mahasiswa has been updated'
            ], REST_Controller_Definitions::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update data!'
            ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }
}
