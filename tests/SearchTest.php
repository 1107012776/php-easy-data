<?php
/**
 * Created by PhpStorm.
 * User: 11070
 * Date: 2021/10/24
 * Time: 0:30
 */
namespace PhpEasyData\Tests;
use PhpEasyData\Components\ConfigEnv;
use PhpEasyData\Tests\Model\ArticleModel;
use PhpEasyData\Tests\Model\UserModel;
use PHPUnit\Framework\TestCase;

$file_load_path = '../../../autoload.php';
if (file_exists($file_load_path)) {
    include $file_load_path;
} else {
    include '../vendor/autoload.php';
}
class SearchTest extends TestCase{
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        ConfigEnv::loadFile('.env');
    }

    public function testConfig(){
       var_dump(ConfigEnv::get('elasticSearch.host'));
    }


    public function testInsert(){
      $user = new ArticleModel();
      $res = $user->insert(['name' => 'John Doe1','tt'=>1]);
      print_r($res);
    }

    public function testSave(){
        $user = new UserModel();
        $res = $user->where([
            'id' => 9
        ])->save(['name' => 11111]);
        var_dump($res);
    }

    public function testAll(){
        $user = new UserModel();
        $res = $user->order('name asc,_id desc')->limit(3,1)->findAll();
        print_r($res);
    }

    public function testOne(){
        $user = new UserModel();
        $res = $user->order('name asc,_id desc')->find();
        print_r($res);
    }


    public function testDelete(){
        $user = new UserModel();
        $res = $user->where([
            'id' => 9
        ])->delete();
        print_r($res);
    }

}