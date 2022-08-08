<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>寵物商品</title>
    <link rel="icon" href="images/標題icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/nav.css">
    <style>
        .petShop{
            width: 80%;
            margin: auto;
            margin-top: 50px;
        }
        .petShop h1{
            text-align: center;
            margin-bottom:10px;
        }
        .petShop h2 span{
            font-size: 14px;
            text-decoration: none;
        }
        .petShop .items{
            display: flex;
            flex-wrap: wrap;
        }
        .petShop .item {
            width:25%;
            margin-bottom:50px;
            position:relative;
        }
        .petShop .pic,
        .petShop .txt{
            width: 90%;
            margin: auto;
        }
        .petShop img {
            width: 100%;
        }

        @media screen and (max-width:960px) {
            .petShop .item {
            width:50%;
        }
        }
        @media screen and (max-width:768px) {
            .petShop .item {
            width:100%;
        }
        }
    </style>
</head>

<body>
    <div class="nav"></div>


    <div class="petShop">
        <h1>寵物商品</h1>
        <div class="items">
        <?
        require_once("db.php");
        $sql = "SELECT * FROM pet2";
        $result = $conn->prepare($sql);
        $result->execute();
        ?>
        <?php while($row=$result->fetch()){ ?>
            <div class="item">
                <div class="pic"><img
                        src="uploadShopImg/<?=$row["img_src"];?>"
                        alt=""></div>
                <div class="txt">
                    <h2><?=$row["name"];?> <span><?=$row["price"];?>$</span></h2>
                    <p>商品介紹:：</p>
                        <p style="white-space:pre-wrap;"><?=$row["data"];?></p>
                    
                </div>
            </div>
            <?php } ?>
        </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <div class="footer"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4998ce33ce.js" crossorigin="anonymous"></script>
    <script>
                //圖片高度
                var imgHW = document.getElementsByClassName('petShop')[0].getElementsByTagName('img');
            for(i=0;i<imgHW.length;i++){
            imgHW[i].style.height = imgHW[i].clientWidth*7/8 + 'px';}
            function carouselPetImg() {
                for(i=0;i<imgHW.length;i++){
            imgHW[i].style.height = imgHW[i].clientWidth*7/8 + 'px';}}
            window.addEventListener('resize', carouselPetImg);
        //加入共用導覽列和頁尾------------------------------------------------------------
        $(".nav").load("nav.html");
        $(".footer").load("footer.html");
    </script>
</body>

</html>