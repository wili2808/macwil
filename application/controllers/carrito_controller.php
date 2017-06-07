<?php 
    class Carrito_controller extends CI_Controller
    {
        //Constructor del controlador
        public function __construct()
        {
            parent::__construct();
            $this ->load->model('carrito_model');
            $this->load->library('cart');
            
        }
        
        public function index()
        {
            //Get all data from database
            $data['products'] = $this->billing_model->get_all();
            //send all product data to "shopping_view", which fetch from database.
            $this->load->view('shopping_view', $data);
        }
        
        private function _veri_log()
        {
            if ($this->session->userdata('logged_in')) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
        function add()
        {
            // Set array for send data.
            $insert_data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => 1
            );
            
            // This function add items into cart.
            $this->cart->insert($insert_data);
            
            // This will show insert data in cart.
            redirect('uniformes');
        }
        
        function remove($rowid) {
            // Check rowid value.
            if ($rowid==="all"){
                // Destroy data which store in session.
                $this->cart->destroy();
            }else{
                // Destroy selected rowid in session.
                $data = array(
                'rowid' => $rowid,
                'qty' => 0
                );
                // Update cart data, after cancel.
                $this->cart->update($data);
            }
            
            // This will show cancel data in cart.
            redirect('uniformes');
        }
        
        function update_cart(){
        // Recieve post values,calcute them and update
        $cart_info = $_POST['cart'] ;
        foreach( $cart_info as $id => $cart)
        {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];

            $data = array(
            'rowid' => $rowid,
            'price' => $price,
            'amount' => $amount,
            'qty' => $qty
            );

            $this->cart->update($data);
        }
            redirect('uniformes');
        }

        function factura_view(){
        // Cargo la vista de la Factura.
            $this->load->view('partes/head_views');
            $this->load->view('partes/cabecera_views');
            $this->load->view('factura_views');
            $this->load->view('partes/footer_views');
        }

        public function save_order()
        {
            if($this->_veri_log())
            {
                // This will store all values which inserted from user.
        //        $customer = array(
        //        'name' => $this->input->post('name'),
        //        'email' => $this->input->post('email'),
        //        'address' => $this->input->post('address'),
        //        'phone' => $this->input->post('phone')
        //        );
                // And store user information in database.
                $session_data = $this->session->userdata('logged_in');
                $usuario_id = $session_data['id'];


                $grand_total = 0;
                // Calculate grand total.
                if ($cart = $this->cart->contents()):
                foreach ($cart as $item):
                $grand_total = $grand_total + $item['subtotal'];
                endforeach;
                endif;



                $order = array(
                'fecha' => date('Y-m-d'),
                'usuario_id' => $usuario_id,
                'precio_total' => $grand_total
                );

                $ord_id = $this->carrito_model->insert_order($order);

                if ($cart = $this->cart->contents()):
                foreach ($cart as $item):
                $order_detail = array(
                'venta_id' => $ord_id,
                'producto_id' => $item['id'],
                'cantidad' => $item['qty'],
                'sub_total' => $item['price']
                );

                // Insert product imformation with order detail, store in cart also store in database.

                $cust_id = $this->carrito_model->insert_order_detail($order_detail);
                endforeach;
                endif;

                // After storing all imformation in database load "billing_success".
                redirect ('home');
            }
            else
            {
                redirect('login', 'refresh');
            }
        }
        


        
        
        
        }
        ?>
        
        
        
        
    }