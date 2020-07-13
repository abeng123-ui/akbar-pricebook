<?php
class ProductTest extends TestCase
{
    public function testCreateProduct(){
        $parameters=[
        'name'=>'ProductName'
        ];

        $this->post('product',$parameters,[]);
        $this->seeStatusCode(200);
        $this->seeJson(['error'=>false]);
    }

    public function testCreateProductReturnError(){
        $parameters=[];

        $this->post('product',$parameters,[]);
        $this->seeStatusCode(200);
        $this->seeJson(['error'=>true]);
    }

}
