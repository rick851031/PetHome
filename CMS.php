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
        .lookForPet{
            width: 80%;
            margin: auto;
            margin-top: 50px;
            position:relative;
        }
        .lookForPet h1{
            text-align: center;
        }
        .lookForPet h1 a{
            font-size:14px;
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
            position:relative;
        }
        .lookForPet textarea{
            width:100%;
            margin-top:5px;
        }
        .lookForPet .edit,
        .lookForPet .delete{
            top:10px;
            right:10px;
            width:30px;
            height:30px;
            font-size:20px;
            background-color:rgba(0,0,0,.5);
            position:absolute;
            border:none;
            color:#fff;     
        }
        .lookForPet .delete2,
        .lookForPet form i{
            position:absolute;
            width:100%;
            height:100%;
            background-color:rgba(0,0,0,0);
            line-height:30px;
            text-align:center;
            border:none;
        }
        .lookForPet form .delete2{
            z-index:1;
            cursor: pointer;
        }
        .lookForPet .edit{
            right:45px;
            cursor: pointer;
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
            display:none;
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
        }

        .editData form .img input {
            width: 100%;
            height: 25px;
        }

        .editData form .img img {
            width: 100%;
        }

        .editData .content {
            font-size: 20px;
        }

        .editData input {
            height: 20px;
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

        @media screen and (max-width:768px) {
            .editData {
                width: 95%;
                margin: auto;
                margin-top: 50px;
            }
            .editData h1{
                font-size:24px;
            }
        }
    </style>
</head>

<body>
    <div class="nav"></div>
    <div class="editData" id="editData">
        <div class="container">
        <h1>編輯寵物資料</h1>
        <div class=close onclick=closeEditData()>❌</div>
        <div class="item">
            <form action="updata.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="eid" />    
            <div class="img">
                    <input type="file" id="src_Img" name="img_src">
                    <img id="eimg_src"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrdj2mBOoTv1AmS6DVo4u9Y0etmzza8aAJWQ&usqp=CAU" />
                </div>
                <div class="content">
                    <label for="dogName">名字：</label>
                    <input type="text" id="ename" name="name">
                    <br>

                    性別：
                    <input type="radio" name="sex" value="男" id="boy">
                    <label for="boy">男</label>
                    <input type="radio" name="sex" value="女" id="girl">
                    <label for="girl">女</label>
                    <br>

                    年齡：
                    <input type="number" name="age" id="eage" min="0" max="30"> 歲
                    <br>

                    <label for="phone">連絡電話：</label>
                    <input type="text" name="phone" id="ephone" maxlength="10" minlength="10">  
                    <textarea name="data" id="edata" placeholder="輸入介紹"></textarea>
                    <input type="submit" value="修改寵物資料" class="submit" name="submit" onclick=closeEditData()>
                </div>
            </form>
        </div>
        </div>
    </div>
<?
require_once("db.php");
$sql = "SELECT * FROM pet";
$result = $conn->prepare($sql);
$result->execute();
?>
    <div class="lookForPet">
        <h1>寵物編輯<span><a href="CMS2.php">商品編輯</a></span></h1>
        <div class="Pet">
        <div class="item">
                <form action="insert.php" method="POST" enctype="multipart/form-data">
                <div class="pic">
                    <img id="petImg"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrdj2mBOoTv1AmS6DVo4u9Y0etmzza8aAJWQ&usqp=CAU" />
                </div>
                <input type="file" id="addImg" name="img_src">
                <div class="content">
                    <label for="dogName">名字：</label>
                    <input type="text" id="dogName" name="name">
                    <br>

                    性別：
                    <input type="radio" name="sex" value="男" id="boy">
                    <label for="boy">男</label>
                    <input type="radio" name="sex" value="女" id="girl">
                    <label for="girl">女</label>
                    <br>

                    年齡：
                    <input type="number" name="age" id="age" min="0" max="30"> 歲
                    <br>

                    <label for="phone">連絡電話：</label>
                    <input type="text" name="phone" id="phone" maxlength="10" minlength="10">


                    <textarea name="data" rows=5 placeholder="輸入介紹"></textarea>
                    <input type="submit" value="新增寵物資料" class="submit" name="submit">
                </div>
            </form>
        </div>
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
                <form method="POST" action="delete.php?a=<?=$row["id"];?>" class="delete">
						<input type="hidden" name="id" value="<?=$row["id"];?>" />
						<input type="submit" name="submit" value="" class="delete2">
                        <i class="fa-solid fa-trash-can"></i>
			</form>
            <button class="edit" name="edit" alt="<?=$row["id"];?>&<?=$row["name"];?>&<?=$row["sex"];?>&<?=$row["age"];?>&<?=$row["data"];?>&<?=$row["img_src"];?>&<?=$row["phone"];?>" onclick=openEditData()><i class="fa-solid fa-pen-to-square"></i></button>  
            </div>
            <?php } ?>
        </div>
    </div>

    







    <div class="footer"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4998ce33ce.js" crossorigin="anonymous"></script>
    <script>
        //圖片高度
            var imgHW = document.getElementsByClassName('lookForPet')[0].getElementsByTagName('img');
            for(i=0;i<imgHW.length;i++){
            imgHW[i].style.height = imgHW[i].clientWidth*7/8 + 'px';}
            function carouselPetImg() {
                for(i=0;i<imgHW.length;i++){
            imgHW[i].style.height = imgHW[i].clientWidth*7/8 + 'px';}}
            window.addEventListener('resize', carouselPetImg);
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
            var sex=document.getElementsByName('sex');
            var eimg_src=document.getElementById('eimg_src');
            var aa = $(this).attr('alt');
            const words = aa.split('&');
            $("#eid").val(words[0]);
            $("#ename").val(words[1]);
            if(words[2]=='男'){
                sex[0].checked=true;
            } else if(words[2]=='女'){
                sex[1].checked=true;
            }
            $("#eage").val(words[3]);
            $("#edata").val(words[4]);
            eimg_src.src='uploadImg/'+words[5];
            $("#ephone").val(words[6]);
            });
                    //上傳寵物的圖片(新增)
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
                //上傳寵物的圖片(修改)
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
        //加入共用導覽列和頁尾------------------------------------------------------------
        $(".nav").load("nav.html");
        $(".footer").load("footer.html");
    </script>
</body>

</html>