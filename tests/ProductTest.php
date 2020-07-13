<?php
class ProductTestextendsTestCase
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
        $this->seeStatusCode(500);
        $this->seeJson(['error'=>true]);
    }

}
