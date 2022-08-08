<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理</title>
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
        .petShop h1 a,
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

        .petShop .edit,
        .petShop .delete{
            top:10px;
            right:20px;
            width:30px;
            height:30px;
            font-size:20px;
            background-color:rgba(0,0,0,.5);
            position:absolute;
            border:none;
            color:#fff;     
        }
        .petShop .delete2,
        .petShop form i{
            position:absolute;
            width:100%;
            height:100%;
            background-color:rgba(0,0,0,0);
            line-height:30px;
            text-align:center;
            border:none;
        }
        .petShop form .delete2{
            z-index:1;
            cursor: pointer;
        }
        .petShop .edit{
            right:55px;
            cursor: pointer;
        }

        .petShop input[type="text"],
        .petShop textarea{
            width:100%;
            font-size: 14px;
            margin-top:5px;
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

        .editData {
            width: 400px;
            height: 500px;
            overflow:hidden;
            margin: auto;
            position: fixed;
            z-index:2;
            top:50px;
            left:0;
            right:0;
            background-color:#fff;
            border:solid 2px #000;
            border-radius:10px;
            display:none
        }
        .editData .container{
            width:100%;
            height:100%;
            overflow:auto;
            position: relative;
        }
        .editData h1 {
            text-align: center;
            font-size: 36px;
            padding:10px;
            border-bottom:solid 1px #000;
        }
        .editData .close{
            position:absolute;
            top:10px;
            right:20px;
            font-size:20px;
            cursor: pointer;
        }
        .editData .item{
            padding:30px;
            width:80%;
        }

        .editData form .pic input {
            width: 100%;
            height: 25px;
        }

        .editData form .pic img {
            width: 100%;
        }

        .editData .txt {
            font-size: 20px;
        }

        .editData input {
            height: 25px;
            margin-bottom: 5px;
        }

        .editData textarea {
            width: 100%;
            height: 150px;
            font-size: 16px;
        }

        .editData .submit {
            font-size: 20px;
            padding: 5px;
            height: auto;
        }

    </style>
</head>

<body>
    <div class="nav"></div>
    <div class="petShop">
        <h1>商品編輯<span><a href="CMS.php">寵物編輯</a></span></h1>
        <div class="items">
        <div class="item">
        <form action="insert2.php" method="POST" enctype="multipart/form-data">
                <div class="pic">
                    <img id="petImg"
                        src="https://static.fotor.com.cn/assets/stickers/11749/e3154a56-8b0d-4163-8ee8-0c0a0676d4d9_medium_thumb.jpg" />
                </div>
                <input type="file" id="addImg" name="img_src">
                <div class="txt">
                    <input type="text"name="name" placeholder="商品名稱">
                    <br>
                    價錢：
                    <input type="number" name="price" min="0" max="99999"> 元
                    <br>
                    <textarea name="data" rows=5 placeholder="輸入商品介紹"></textarea>
                    <input type="submit" value="登入商品" class="submit" name="submit">
                </div>
            </form>
        </div>

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
                    <p>商品介紹:</p>
                        <p style="white-space:pre-wrap;"><?=$row["data"];?></p>
                    
                </div>
                <form method="POST" action="delete2.php?a=<?=$row["id"];?>" class="delete">
                    <input type="hidden" name="id" value="<?=$row["id"];?>" />
                    <input type="submit" name="submit" value="" class="delete2">
                    <i class="fa-solid fa-trash-can"></i>
        </form>
        <button class="edit" name="edit" alt="<?=$row["id"];?>&<?=$row["name"];?>&<?=$row["price"];?>&<?=$row["data"];?>&<?=$row["img_src"];?>" onclick=openEditData()><i class="fa-solid fa-pen-to-square"></i></button>  
            </div>
            <?php } ?>
        </div>
    </div>
    </div>


    <div class="editData">
    <div class="container">
    <h1>編輯商品資料</h1>
    <div class=close onclick=closeEditData()>❌</div>
    <div class="item">
        <form action="updata2.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" id="eid" />
        <input type="file" id="src_Img" name="img_src">
                <div class="pic">
                    <img id="eimg_src"
                        src="https://static.fotor.com.cn/assets/stickers/11749/e3154a56-8b0d-4163-8ee8-0c0a0676d4d9_medium_thumb.jpg" />
                </div>
                <div class="txt">
                    商品名稱：<input type="text" id="ename" name="name" placeholder="商品名稱">
                    <br>
                    價錢：
                    <input type="number" name="price" id="eprice" min="0" max="99999"> 元
                    <br>
                    <textarea name="data" id="edata" rows=3 placeholder="輸入商品介紹"></textarea>
                    <input type="submit" value="登入商品" class="submit" name="submit" onclick=closeEditData()>
                </div>
            </form>
        </div>
    </div>
    </div>

    <div class="footer"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4998ce33ce.js" crossorigin="anonymous"></script>
    <script>

            alert('本網頁有連接資料庫，可進行新增、修改、刪除。前六筆資料為示範，請勿修改與刪除，如果需要測試功能請先自行在第一格新增資料再做修改與刪除的動作，感謝您的配合。')
                //圖片高度
                var imgHW = document.getElementsByClassName('petShop')[0].getElementsByTagName('img');
            for(i=0;i<imgHW.length;i++){
            imgHW[i].style.height = imgHW[i].clientWidth*7/8 + 'px';}
            function carouselPetImg() {
                for(i=0;i<imgHW.length;i++){
            imgHW[i].style.height = imgHW[i].clientWidth*7/8 + 'px';}}
            window.addEventListener('resize', carouselPetImg);
                            //上傳商品的圖片(新增)
                            $("#addImg").change(function () {
            readURL(this);
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#petImg").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        //上傳商品的圖片(修改)
        $("#src_Img").change(function () {
            readURL2(this);
        });
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#eimg_src").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
                //編輯欄開關
                var editData=document.getElementsByClassName('editData')[0];
        function closeEditData(){
            editData.style.display='none';
        }
        function openEditData(){
            editData.style.display='block';
        }
        //編輯畫面內容
        $("button[name=edit]").click(function(){
            var eimg_src=document.getElementById('eimg_src');
            var aa = $(this).attr('alt');
            const words = aa.split('&');
            $("#eid").val(words[0]);
            $("#ename").val(words[1]);
            $("#eprice").val(words[2]);
            $("#edata").val(words[3]);
            eimg_src.src='uploadShopImg/'+words[4];
            });
        //加入共用導覽列和頁尾------------------------------------------------------------
        $(".nav").load("nav.html");
        $(".footer").load("footer.html");
    </script>
</body>

</html>