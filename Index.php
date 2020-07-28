<?php

namespace app\manage\controller;



class Index
{

    //生成二维码
    public function merchantEwm()
    {
        // 自定义二维码配置
        $config = [
            'title'         => true,
            'title_content' => input('get.id'),
            'logo'          => false,
            'logo_url'      => './logo.png',
            'logo_size'     => 80,
        ];

        // 直接输出
        $qr_url = 'http://www.baidu.com?id=' . input('get.id');

        $qr_code = new Qrcodeserver($config);
        $qr_img = $qr_code->createServer($qr_url);
        echo $qr_img;
        die;
        // 写入文件
        $qr_url = '这是个测试二维码';
        $file_name = './static/qrcode';  // 定义保存目录

        $config['file_name'] = $file_name;
        $config['generate']  = 'writefile';

        $qr_code = new Qrcodeserver($config);
        $rs = $qr_code->createServer($qr_url);
        dump($rs);
//        print_r($rs);

        exit;
    }

}
