<?php


class product
{

    public $productName;
    public $productQuantity;
    public $productPrice;
    public $tax;
    public $sale;
    public function calculatePriceWithTax ()
    {
        //some imlementation

    }
    public function __construct ($productName,$productQuantity,$productPrice,$tax,$sale)
    {
        $this->productName = $productName;
        $this->productQuantity = $productQuantity;
        $this->productPrice = $productPrice;
        $this->tax = $tax;
        $this->sale = $sale;
    }

}

class shoppingOrder
{
    public $orderNumber;
    public $product;

    public function __construct ($orderNumber)
    {
        $this -> orderNumber = $orderNumber;
    }
    public function setProduct (product $product)
    {
        $this-> product = $product;

    }


}

class ShippingOrderDIContainer
{

    public $parameters = array();


    public function __construct ($parameters) {

        $this->parameters = $parameters ;

    }

    public function createProduct () {
        return new product(
            $this->parameters['name'],
            $this->parameters['price'],
            $this->parameters['quantity'],
            $this->parameters['tax'],
            $this->parameters['sale'],
        );
    }


    public function CreateShoppingOrder ($product) {

        $order =  new shoppingOrder($this->parameters['orderNumber']);

            $order->setProduct($product);
        return $order;

    }
}

//$product = new product('apple Juce',2, 200,2.1,.02);
//$order   = new shoppingOrder(2);
//$order->setProduct ($product);


$container = new ShippingOrderDIContainer(array(
    'name'=>'apple juce',
    'price'=>'200',
    'quantity'=>'2',
    'tax'=>'2.1',
    'sale'=>'.02',
    'orderNumber'=>'103',
));
$order = $container->createShoppingOrder($container->createProduct ());
echo "<pre>";
var_dump ($order);
echo "</pre>";