<?php

require_once APPPATH."/libraries/REST_Controller.php";
 
class User extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authentication','auth');
        //$this->load->model('book_model');
    }

    // USER LOGIN API HERE //
    function login_post()
    {
        $this->form_validation->set_rules('username', ' Reference ID', 'required', array('is_unique' => 'Reference ID already exist.'));
        $this->form_validation->set_rules('userpass', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if($this->input->post('username') !='' && $this->input->post('userpass') !=''){
            if($this->form_validation->run() == FALSE) {   } else {

                $username = $this->input->post('username');
                $userpass = $this->input->post('userpass');

                $result = $this->auth->verification($username, $userpass);

                if(isset($result->cms_id) && ($result->cms_id > 0)){

                    $token = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
    
                    if($result->cms_role==6){

                        $login_id = $result->cms_id;
                        $tokenValue = array('cms_token'=>$token, 'cms_last_login_datetime'=>date('Y-m-d H:i:s'));
                        $this->auth->save_token($login_id, $tokenValue); 

                        $userArray = array(
                            'cms_id'    => $result->cms_id,
                            'cms_ref_id'=> $result->cms_ref_id,
                            'cms_email' => $result->cms_email,
                            'cms_role'  => $result->cms_role,
                            'cms_token' => $token,
                            'status'    => "200"
                        );
                        $this->response($userArray, 200);
                    }
                }else{
                    $this->response("Enter complete book information to save", 400);
                }
            }
        }else{
            $this->response("Book information coild not be saved. Try again.", 404);
        }
    }

    //API - client sends isbn and on valid isbn book information is sent back
    function bookByIsbn_get(){

        $isbn  = $this->get('isbn');
        
        if(!$isbn){

            $this->response("No ISBN specified", 400);

            exit;
        }

        $result = $this->book_model->getbookbyisbn( $isbn );

        if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("Invalid ISBN", 404);

            exit;
        }
    } 

    //API -  Fetch All books
    function books_get(){

        $result = $this->book_model->getallbooks();

        if($result){

            $this->response($result, 200); 

        } 

        else{

            $this->response("No record found", 404);

        }
    }
     
    //API - create a new book item in database.
    function addBook_post(){

         $name      = $this->post('name');

         $price     = $this->post('price');

         $author    = $this->post('author');

         $category  = $this->post('category');

         $language  = $this->post('language');

         $isbn      = $this->post('isbn');

         $pub_date  = $this->post('publish_date');
        
         if(!$name || !$price || !$author || !$price || !$isbn || !$category){

                $this->response("Enter complete book information to save", 400);

         }else{

            $result = $this->book_model->add(array("name"=>$name, "price"=>$price, "author"=>$author, "category"=>$category, "language"=>$language, "isbn"=>$isbn, "publish_date"=>$pub_date));

            if($result === 0){

                $this->response("Book information coild not be saved. Try again.", 404);

            }else{

                $this->response("success", 200);  
           
            }

        }

    }

    
    //API - update a book 
    function updateBook_put(){
         
         $name      = $this->put('name');

         $price     = $this->put('price');

         $author    = $this->put('author');

         $category  = $this->put('category');

         $language  = $this->put('language');

         $isbn      = $this->put('isbn');

         $pub_date  = $this->put('publish_date');

         $id        = $this->put('id');
         
         if(!$name || !$price || !$author || !$price || !$isbn || !$category){

                $this->response("Enter complete book information to save", 400);

         }else{
            $result = $this->book_model->update($id, array("name"=>$name, "price"=>$price, "author"=>$author, "category"=>$category, "language"=>$language, "isbn"=>$isbn, "publish_date"=>$pub_date));

            if($result === 0){

                $this->response("Book information coild not be saved. Try again.", 404);

            }else{

                $this->response("success", 200);  

            }

        }

    }

    //API - delete a book 
    function deleteBook_delete()
    {

        $id  = $this->delete('id');

        if(!$id){

            $this->response("Parameter missing", 404);

        }
         
        if($this->book_model->delete($id))
        {

            $this->response("Success", 200);

        } 
        else
        {

            $this->response("Failed", 400);

        }

    }


}