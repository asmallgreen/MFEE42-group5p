<!doctype html>
<html lang="en">

<head>
  <title>Sign up</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>
    body{
        background: #eee;
    }
    .a{
  padding-inline: 40px;
    }
</style>
</head>

<body class="bg-light">
  <div class="py-4 container d-flex justify-content-center align-items-center">
    <div class="signUpPanel">
        <h1 class="h3 text-center">註冊</h1>
        <form action="_doSignUp-test.php" method="post">
            <div class="mb-2">
                <label for="">帳號</label>
                <input type="text" name="account" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">密碼</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">再輸入一次密碼</label>
                <input type="password" name="repassword" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">姓名</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">性別</label>
                <select name="gender" id="">
                    <option value="">請選擇</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="">生日</label>
                <input type="date" name="birthday" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">手機號碼</label>
                <input type="tel" name="phone" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">地址</label>
                <br>
                <label for="">縣市:</label>
                <select name="city" id="city" onchange="changeDist()">
                    <option value="">請選擇</option>
                    <option value="taipei">台北市</option>
                    <option value="newTaipei">新北市</option>
                    <option value="keelung">基隆市</option>
                    <option value="taoyuan">桃園市</option>
                    <option value="hsinchu">新竹縣</option>
                    <option value="hsinchuCity">新竹市</option>
                    <option value="miaoli">苗栗縣</option>
                    <option value="taichung">台中市</option>
                    <option value="changhua">彰化縣</option>
                    <option value="nantou">南投縣</option>
                    <option value="yunlin">雲林縣</option>
                    <option value="chiayi">嘉義縣</option>
                    <option value="chiayiCity">嘉義市</option>
                    <option value="tainan">台南市</option>
                    <option value="kaohsiung">高雄市</option>
                    <option value="pingtung">屏東縣</option>
                    <option value="yilan">宜蘭縣</option>
                    <option value="hualien">花蓮縣</option>
                    <option value="taitung">台東縣</option>
                    <option value="penghu">澎湖縣</option>
                    <option value="kinmen">金門縣</option>
                    <option value="lienchiang">連江縣</option>

                    <input type="hidden" name="selected_city" id="selected_city" value="">

                </select>
                <label for="">行政區:</label>
                <select name="district" id="district"></select>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="text-end">
            <a href="sign-in-test.php" class="btn btn-info">回上一頁</a>
            <button class="btn btn-info a">送出</button>
            </div>
        </form>
    </div>

  </div>

<script>
function changeDist(){
    const citySelect= document.querySelector("#city");
    const selectedCity = citySelect.options[citySelect.selectedIndex].text;
    const inputCity= document.querySelector("#selected_city");
          inputCity.value=selectedCity;
        //  document.getElementById("selected_city").value = selectedCity;
    const districtSelect= document.querySelector("#district");
    const city= citySelect.value;
    districtSelect.innerHTML = "";

    if(city=== "taipei"){
        var taipeiDistricts = ["中正區", "大同區", "中山區", "松山區", "大安區", "萬華區", "信義區", "士林區", "北投區", "內湖區", "南港區", "文山區"];
        for(var i=0; i< taipeiDistricts.length; i++){
            var option = document.createElement("option");
            option.text= taipeiDistricts[i];
            option.value= taipeiDistricts[i];
            districtSelect.add(option);
        }

    } else if (city==="newTaipei") {
        var newTaipeiDistricts = ["板橋區", "三重區", "中和區", "永和區", "新莊區", "新店區", "樹林區", "鶯歌區", "三峽區", "淡水區", "汐止區", "瑞芳區", "土城區", "蘆洲區", "五股區", "泰山區", "林口區", "深坑區", "石碇區", "坪林區", "三芝區", "石門區", "八里區", "平溪區", "雙溪區", "貢寮區", "金山區", "萬里區", "烏來區"];
        for (var i = 0; i < newTaipeiDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = newTaipeiDistricts[i];
                    option.value = newTaipeiDistricts[i];
                    districtSelect.add(option);
                }
    } else if (city === "taoyuan") {
        var taoyuanDistricts = ["桃園區", "中壢區", "平鎮區", "楊梅區", "新屋區", "觀音區", "龍潭區", "復興區", "大溪區", "大園區", "蘆竹區"];
        for (var i = 0; i < taoyuanDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = taoyuanDistricts[i];
                    option.value = taoyuanDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "taichung") {
        var taichungDistricts = ["中區", "東區", "南區", "西區", "北區", "北屯區", "西屯區", "南屯區", "太平區", "大里區", "霧峰區", "烏日區", "豐原區", "后里區", "石岡區", "東勢區", "新社區", "潭子區", "大雅區", "神岡區", "大肚區", "沙鹿區", "龍井區", "梧棲區", "清水區", "大甲區", "外埔區", "大安區"];
        for (var i = 0; i < taichungDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = taichungDistricts[i];
                    option.value = taichungDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "tainan") {
        var tainanDistricts = ["中西區", "東區", "南區", "北區", "安平區", "安南區", "永康區", "歸仁區", "新化區", "左鎮區", "玉井區", "楠西區", "南化區", "仁德區", "關廟區", "龍崎區", "官田區", "麻豆區", "佳里區", "西港區", "七股區", "將軍區", "學甲區", "北門區", "新營區", "後壁區", "白河區", "東山區", "六甲區", "下營區", "柳營區", "鹽水區", "善化區", "大內區", "山上區", "新市區", "安定區"];
        for (var i = 0; i < tainanDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = tainanDistricts[i];
                    option.value = tainanDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "kaohsiung") {
        var kaohsiungDistricts = ["新興區", "前金區", "苓雅區", "鹽埕區", "鼓山區", "旗津區", "前鎮區", "三民區", "楠梓區", "小港區", "左營區", "仁武區", "大社區", "東沙群島", "南沙群島", "岡山區", "路竹區", "阿蓮區", "田寮區", "燕巢區", "橋頭區", "梓官區", "彌陀區", "永安區", "湖內區", "鳳山區", "大寮區", "林園區", "鳥松區", "大樹區", "旗山區", "美濃區", "六龜區", "內門區", "杉林區", "甲仙區", "桃源區", "那瑪夏區", "茂林區", "茄萣區"];
        for (var i = 0; i < kaohsiungDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = kaohsiungDistricts[i];
                    option.value = kaohsiungDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "keelung") {
        var keelungDistricts = ["仁愛區", "信義區", "中正區", "中山區", "安樂區", "暖暖區", "七堵區"];
        for (var i = 0; i < keelungDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = keelungDistricts[i];
                    option.value = keelungDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "hsinchuCity") {
        var hsinchuCityDistricts = ["東區", "北區", "香山區"];
        for (var i = 0; i < hsinchuCityDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = hsinchuCityDistricts[i];
                    option.value = hsinchuCityDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "hsinchu") {
        var hsinchuDistricts = ["竹北市", "湖口鄉", "新豐鄉", "新埔鎮", "關西鎮", "芎林鄉", "寶山鄉", "竹東鎮", "五峰鄉", "橫山鄉", "尖石鄉", "北埔鄉", "峨眉鄉"];
        for (var i = 0; i < hsinchuDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = hsinchuDistricts[i];
                    option.value = hsinchuDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "miaoli") {
        var miaoliDistricts = ["苗栗市", "苑裡鎮", "通霄鎮", "竹南鎮", "頭份市", "後龍鎮", "卓蘭鎮", "大湖鄉", "公館鄉", "銅鑼鄉", "南庄鄉", "頭屋鄉", "三義鄉", "西湖鄉", "造橋鄉", "三灣鄉", "獅潭鄉", "泰安鄉"];
        for (var i = 0; i < miaoliDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = miaoliDistricts[i];
                    option.value = miaoliDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "changhua") {
        var changhuaDistricts = ["彰化市", "鹿港鎮", "和美鎮", "線西鄉", "伸港鄉", "福興鄉", "秀水鄉", "花壇鄉", "芬園鄉", "員林市", "溪湖鎮", "田中鎮", "大村鄉", "埔鹽鄉", "埔心鄉", "永靖鄉", "社頭鄉", "二水鄉", "北斗鎮", "二林鎮", "田尾鄉", "埤頭鄉", "芳苑鄉", "大城鄉", "竹塘鄉", "溪州鄉"];
        for (var i = 0; i < changhuaDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = changhuaDistricts[i];
                    option.value = changhuaDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "nantou") {
        var nantouDistricts = ["南投市", "埔里鎮", "草屯鎮", "竹山鎮", "集集鎮", "名間鄉", "鹿谷鄉", "中寮鄉", "魚池鄉", "國姓鄉", "水里鄉", "信義鄉", "仁愛鄉"];
        for (var i = 0; i < nantouDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = nantouDistricts[i];
                    option.value = nantouDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "yunlin") {
        var yunlinDistricts = ["斗六市", "斗南鎮", "虎尾鎮", "西螺鎮", "土庫鎮", "北港鎮", "古坑鄉", "大埤鄉", "莿桐鄉", "林內鄉", "二崙鄉", "崙背鄉", "麥寮鄉", "東勢鄉", "褒忠鄉", "台西鄉", "元長鄉", "四湖鄉", "口湖鄉", "水林鄉"];
        for (var i = 0; i < yunlinDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = yunlinDistricts[i];
                    option.value = yunlinDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "chiayiCity") {
        var chiayiCityDistricts = ["西區", "東區"];
        for (var i = 0; i < chiayiCityDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = chiayiCityDistricts[i];
                    option.value = chiayiCityDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "chiayi") {
        var chiayiDistricts = ["番路鄉", "梅山鄉", "竹崎鄉", "阿里山鄉", "中埔鄉", "大埔鄉", "水上鄉", "鹿草鄉", "太保市", "朴子市", "東石鄉", "六腳鄉", "新港鄉", "民雄鄉", "大林鎮", "溪口鄉", "義竹鄉", "布袋鎮"];
        for (var i = 0; i < chiayiDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = chiayiDistricts[i];
                    option.value = chiayiDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "pingtung") {
        var pingtungDistricts = ["屏東市", "潮州鎮", "東港鎮", "恆春鎮", "萬丹鄉", "長治鄉", "麟洛鄉", "九如鄉", "里港鄉", "鹽埔鄉", "高樹鄉", "萬巒鄉", "內埔鄉", "竹田鄉", "新埤鄉", "枋寮鄉", "新園鄉", "崁頂鄉", "林邊鄉", "南州鄉", "佳冬鄉", "琉球鄉", "車城鄉", "滿州鄉", "枋山鄉", "三地門鄉", "霧臺鄉", "瑪家鄉", "泰武鄉", "來義鄉", "春日鄉", "獅子鄉", "牡丹鄉"];
        for (var i = 0; i < pingtungDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = pingtungDistricts[i];
                    option.value = pingtungDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "yilan") {
        var yilanDistricts = ["宜蘭市", "頭城鎮", "礁溪鄉", "壯圍鄉", "員山鄉", "羅東鎮", "三星鄉", "大同鄉", "五結鄉", "冬山鄉", "蘇澳鎮", "南澳鄉"];
        for (var i = 0; i < yilanDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = yilanDistricts[i];
                    option.value = yilanDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "hualien") {
        var hualienDistricts = ["花蓮市", "新城鄉", "秀林鄉", "吉安鄉", "壽豐鄉", "鳳林鎮", "光復鄉", "豐濱鄉", "瑞穗鄉", "萬榮鄉", "玉里鎮", "卓溪鄉", "富里鄉"];
        for (var i = 0; i < hualienDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = hualienDistricts[i];
                    option.value = hualienDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "taitung") {
        var taitungDistricts = ["臺東市", "成功鎮", "關山鎮", "卑南鄉", "鹿野鄉", "池上鄉", "東河鄉", "長濱鄉", "太麻里鄉", "大武鄉", "綠島鄉", "海端鄉", "延平鄉", "金峰鄉", "達仁鄉", "蘭嶼鄉"];
        for (var i = 0; i < taitungDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = taitungDistricts[i];
                    option.value = taitungDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "penghu") {
        var penghuDistricts = ["馬公市", "西嶼鄉", "望安鄉", "七美鄉", "白沙鄉", "湖西鄉"];
        for (var i = 0; i < penghuDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = penghuDistricts[i];
                    option.value = penghuDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "kinmen") {
        var kinmenDistricts = ["金城鎮", "金湖鎮", "金沙鎮", "金寧鄉", "烈嶼鄉", "烏坵鄉"];
        for (var i = 0; i < kinmenDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = kinmenDistricts[i];
                    option.value = kinmenDistricts[i];
                    districtSelect.add(option);
                }
    }else if (city === "lienchiang") {
        var lienchiangDistricts = ["南竿鄉", "北竿鄉", "莒光鄉", "東引鄉"];
        for (var i = 0; i < lienchiangDistricts.length; i++) {
                    var option = document.createElement("option");
                    option.text = lienchiangDistricts[i];
                    option.value = lienchiangDistricts[i];
                    districtSelect.add(option);
                }
    }
}

</script>

</body>


</html>