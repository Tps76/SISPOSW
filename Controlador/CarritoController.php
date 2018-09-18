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
    public function addItem($code, $amount)
    {
        $dato = $code;

        $item = Carrito::searchItem($dato);
        if ($item > 0) {
            // echo "<pre>";
            // print_r($this->carrito);
            // echo "</pre>";
            // return "si encontro";
            $cart = $this->carrito;
            $item['cant']=$amount;
            if (!empty($cart)) {
                foreach ($cart as $key => $value) {
                    if ($value['idproducto'] == $dato) {
                        $item['cant']+= $value['cant'];
                    }
                }
            }
            $item['subtotal'] = $item['cant'] * $item['venta_producto'];
            $id = $item['idproducto'];
            $_SESSION['carrito'][$id] = $item;
            $this->updateCart();
            header("index.php");
            return true;
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
                        <td>'.$value['nombre_producto'].'</td>
                        <td>'.$value['cant'].'</td>
                        <td>'.$value['venta_producto'].'</td>
                        <td>
                                <button type="button" class="btn btn-danger" id="remove" value="'.$code.'">
                                <i class="material-icons">delete_forever</i>
                                </button>
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
        // header("location:index.php");
    }

    public function getTotalpayment()
    {
        $total = 0;
        if (!empty($this->carrito)) {
            foreach ($this->carrito as $key) {
                $total+= $key["subtotal"];
            }
        }
        echo $total;
    }

    public function updateCart()
    {
        self::__construct();
    }
}
