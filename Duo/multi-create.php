
<?php
$data2=[
    {
        idNum: 'Y286803761',
        name: '于柔建',
        phone: '0934840562',
        address: '彰化縣社頭鄉延平街433號之1'
      }
      {
        idNum: 'S265845381',
        name: '馬怡岱',
        phone: '0924248477',
        address: '臺中市大里區中興路１段298巷275號15樓'
      }
      {
        idNum: 'N118578439',
        name: '于培珊',
        phone: '0935754681',
        address: '苗栗縣苑裡鎮健康二街97號6樓'
      }
      {
        idNum: 'E243376680',
        name: '謝霖君',
        phone: '0938271546',
        address: '桃園市新屋區東勢315號15樓'
      }

    ];

    $data2 = str_replace(array("\r\n", "\n", "\r", " "), "", $data2);

    // 在每个数据项之前添加逗号
    $data2 = str_replace("}{", "},{", $data2);
    
    // 将数据包装成 JSON 格式
    $jsonData = "[" . $data2 . "]";
    
    // 解析 JSON 数据为关联数组
    $dataArray = json_decode($jsonData, true);
    
    var_dump($dataArray);


