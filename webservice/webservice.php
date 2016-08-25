<?php
class WebService{
    public function index(){
         $wsdl='http://172.16.1.226:8080//services/WorkflowService?wsdl';
        //实例化对象
        $client=new SoapClient($wsdl);
        //接口参数。
        /*$param1=array('password'=>'123456','dis_code'=>'fxBZZHLYW','checkcode'=>'FXFAXM5U1Y');
        //接口方法。
        $ret1 = $client->getAvailableProducts($param1);
        //将XML数据转换成数组
        $array=(array)$ret1;
        //转换成simplexml_load_string对象
        $v=simplexml_load_string($array['return']);
        //数组定义
        $Varr=$v->ybproducts->fzhproducts->product;
        //获取到具体的值
        for ($i=0; $i < count($Varr); $i++) {
            echo $Varr[$i]->prod_id;
            echo $Varr[$i]->product_name;
            echo $Varr[$i]->prod_code;
            echo $Varr[$i]->prod_category;
            echo $Varr[$i]->supply_id;
            echo $Varr[$i]->price;
            echo $Varr[$i]->parprice;
            echo $Varr[$i]->total_ticket_num;
            echo $Varr[$i]->inventory;
            echo $Varr[$i]->product_name;
            echo $Varr[$i]->product_name;
            echo '<br/>';
        }*/
        //获取接口所有方法及参数
        echo "<pre>";

        print_r($client->__getfunctions());
        print_r($client->__getTypes());
    }
}

$instance = new WebService();
$instance->index();
