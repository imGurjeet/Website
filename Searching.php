<?php
if(isset($_POST['text']))
{ 
    $text=$_POST['text'];
    header( "refresh:0;url=https://www.google.com/search?q=$text");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        *
        {
            user-select: none;
            cursor: default;
            transition: all .4s;
        }
        ul
        {
            margin-left: -70PX;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        li
        {
            padding: 5px;
            font-weight: 700;
            margin: 15px;
        }
        #search
        {
            height: 20px;
            width: 1px;
            opacity: 0%;
        }
        #search:focus
        {
            opacity: 100%;
            width: 100px;
        }
        .sbar
        {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .img
        {
            height: 25px;
        }
        li:hover
        {
            text-shadow: 0px 10px 8px rgba(0, 0, 0, 0.692);
            margin-top: -0.1%;
        }
        .google
        {
            font-size: 100px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
            display: flex;
            justify-content: center;
        }
        p
        {
            font-weight: 600;
        }
        p:nth-child(1)
        {
            color: rgb(0, 110, 255);
        }
        p:nth-child(2)
        {
            color: rgb(255, 0, 0);
        }
        p:nth-child(3)
        {
            color: rgb(255, 217, 0);
        }
        p:nth-child(4)
        {
            color: rgb(0, 110, 255);
        }
        p:nth-child(5)
        {
            color: rgb(10, 173, 18);
        }
        p:nth-child(6)
        {
            color: rgb(255, 0, 0);
        }
        p:hover
        {
            margin-top: 50px;
            text-shadow: 0px 50px 25px ;
        }
        .input
        {
            outline:none;
            text-transform: capitalize;
            font-size: 20px;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.171);
            border-radius: 50px;
            width: 600px;
            height: 40px;
        }
        .input:hover
        {
            box-shadow: 0px 1.2px 4px 2px rgba(0, 0, 0, 0.144) ;
        }
        .container
        {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: -80px;
        }
        .icon
        {
            opacity: 60%;
            height: 25px;
            position: relative;
            left: 40px;
        }
        .mic
        {
            height: 30px;
            position: relative;
            right: 65px;
        }
        .cam
        {
            height: 23px;
            position: relative;
            right: 72px;
        }
        .btn
        {
            transition: all .2s;
            position: absolute;
            left: 46%;
            height: 40px;
            width: 100px;
            margin-top: 60px;
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.171);
            background-color: white;
            color: gray;
        }
        .btn:hover
        {
            color: rgb(76, 76, 76);
            box-shadow: 0px 1.2px 4px 2px rgba(0, 0, 0, 0.144) ;

        }
        .btn:active
        {
            margin-top: 62px;
            box-shadow: none;   
        }
    </style>
</head>
<body>
    <ul>
        <li>HOME</li>
        <li>GALLERY</li>
        <li>CONTECT US</li>
        <li>ABOUT</li>
    </ul>
    <div>
        <label class="google"><p>S</p><p>e</p><p>a</p><p>r</p><p>c</p><p>h</p></label>
        <div class="container">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBsAAR_QYNPoqUK3z58t75hg4tDY_qWyNaiI0QW0GWRsZNuOJUAtHJ-g_O17ocBhPAMKE&usqp=CAU" class="icon">
                <form action="searching.php" method="POST">
                    <input class="input" type="text" name="text">
                </form>     
            <img src="https://static.wikia.nocookie.net/logopedia/images/2/2b/Google_Lens_2021.svg/" class="cam">
            <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-25-512.png" alt="" class="mic">
        </div> 
    </div>
</body>
</html>