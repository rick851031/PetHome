<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>尋找寵物</title>
    <link rel="icon" href="images/標題icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/nav.css">
    <style>
        .lookForPet{
            width: 80%;
            margin: auto;
            margin-top: 50px;
        }
        .lookForPet h1{
            text-align: center;
        }
        .lookForPet h1 span{
            font-size: 14px;
        }
        .lookForPet h1 a{
            text-decoration: none;
        }
        .lookForPet .Pet{
            display: flex;
            flex-wrap: wrap;
        }
        .lookForPet .item{
            width: 30%;
            margin: 1.66%;
            margin-bottom: 30px;
        }

        .lookForPet .pic img{
            width: 100%;
           
            object-fit: cover;
        }
        .lookForPet .item .txt{
            padding-left:5px;
        }
        @media screen and (max-width:960px) {
            .lookForPet .item{
            width: 45%;
            margin:2.5%;
            margin-bottom: 30px;
        }
        .lookForPet{
            width: 90%;
        }
        }
        @media screen and (max-width:768px) {
            .lookForPet .item{
            width: 90%;
            margin:auto;
            margin-bottom: 30px;
        }
        .lookForPet{
            width: 100%;
        }
        }
    </style>
</head>

<body>
<?
require_once("db.php");
$sql = "SELECT * FROM pet";
$result = $conn->prepare($sql);
$result->execute();
?>
    <div class="nav"></div>

    <div class="lookForPet">
        <h1>尋找寵物
        <!-- <a href="lookForMaster.html"><span>尋找主人</span></a> -->
    </h1>
        <div class="Pet">
        <?php
        while($row=$result->fetch()){ ?>
            <div class="item">
                <div class="pic"><img src="uploadImg/<?=$row["img_src"];?>" alt=""></div>
                <div class="txt">
                    <h3><?=$row["name"];?></h3>
                    <p>性別:<?=$row["sex"];?> 年齡:<?=$row["age"];?> <br>
                    聯絡電話：<?=$row["phone"];?> <br>
                    寵物介紹:</p>
                    <p style="white-space:pre-wrap;"><?=$row["data"];?></p>
                    
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="footer"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4998ce33ce.js" crossorigin="anonymous"></script>
    <script>
            var imgHW = document.getElementsByClassName('lookForPet')[0].getElementsByTagName('img');
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