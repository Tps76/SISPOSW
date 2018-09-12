<?php

// require_once 'app/models/Carrito.php';

class CarritoController
{
    private $carrito = array();

    public function __construct()
    {
        if (isset($_SESSION['carrito'])) {
            $this->carrito = $_SESSION['carrito'];
        }
    }
    public function addItem($code)
    {
        $dato = $code;

        $item = Carrito::searchItem($dato);
        if ($item > 0) {
            // echo "<pre>";
            // print_r($this->carrito);
            $cart = $this->carrito;
            $item['cant']=1;
            if (!empty($cart)) {
                foreach ($cart as $key => $value) {
                    if ($value['cod_prod'] == $dato) {
                        //     $item['cant']+= $value['cant'];
                    }
                }
            }
            $item['subtotal'] = $item['cant'] * $item['precio_prod'];
            $id = $item['cod_prod'];
            $_SESSION['carrito'][$id] = $item;
            $this->updateCart();
            return 1;
            // header('location:index');
        }else{
            return $dato;
        }
    }
    public function getItem()
    {
        $html = '';
        if (!empty($this->carrito)) {
                foreach ($this->carrito as $key => $value) {
                $code = $key;
                $html.= '<tr>
                            <td>'.$value['nom_prod'].'</td>
                            <td>'.$value['precio_prod'].'</td>
                            <td>'.$value['cant'].'</td>
                            <td>
                                <form method="POST">
                                    <button type="submit" class="waves-effect red accent-4 btn" name="remove" value="'.$code.'">
                                    <i class="material-icons">delete_forever</i>
                                    </button>
                                </form>
                            </td>
                        </tr>'
                        ;
            }
        }
        echo $html;

    }
    public function removeItem($code)
    {
        unset($_SESSION['carrito'][$code]);
        $this->updateCart();
        return "1";
    }
    public function updateCart()
    {
        self::__construct();
    }
}
