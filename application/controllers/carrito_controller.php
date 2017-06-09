<?php 
    class Carrito_controller extends CI_Controller
    {
        //Constructor del controlador
        public function __construct()
        {
            parent::__construct();
            $this ->load->model('carrito_model');
            $this ->load->model('producto_model');
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
            'stock' => $this->input->post('stock'),
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
            $tit = array ('titulo' => 'Factura');
            
            $this->load->view('partes/head_views',$tit);
            $this->load->view('partes/cabecera_views');
            $this->load->view('factura_views');
            $this->load->view('partes/footer_views');
        }
        
        public function save_order()
        {
            if($this->_veri_log())
            {
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
                
                //Actualizo valores de stock de productos
                
                if ($cart = $this->cart->contents()):
                foreach ($cart as $item):
                $id = $item['id'];
                $dat = array('stock'=>($item['stock'] - $item['qty']));
                $this->producto_model->set_producto($id, $dat);
                endforeach;
                endif;
                
                $this->cart->destroy();
                
                // After storing all imformation in database load "billing_success".
                redirect ('compra_realizada');
            }
            else
            {
                redirect('login', 'refresh');
            }
        }
        
        function compra_realizada (){
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['usuario'];
            
            $this->load->view('partes/head_views');
            $this->load->view('partes/cabecera_views');
            $this->load->view('compra_realizada_views',$data);
            $this->load->view('partes/footer_views');   
        }
    }
?>