<?php 
  $error = "";
  $success = "";
  if($_POST){
    if(!$_POST["email"]){
       $error .= "<p>An email address is required. </p>"; 
    }
    if(!$_POST["name"]){
       $error .= "<p>The name field is required. </p>"; 
    }
    if(!$_POST["subject"]){
       $error .= "<p>The Subject field is required. </p>"; 
    }
    if(!$_POST["content"]){
       $error .= "<p>The message field is required. </p>"; 
    }
    if(!$_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)===false){
        $error .= "<p>The email address is invalid! , Please enter a valid email address.</p>";
    }
    //check for error now

    if($error != ""){
        $error = '<div id="error" role="alert"> <p>There are error(s) in your form</p>' . $error . '</div>';
    }
    else{
        $emailTo = "jeetstarssj2@gmail.com";
        $subject = $_POST["subject"];
        $content = $_POST["content"];
        $headers = "From:" . $_POST["email"];

        //try emailing
        if(mail($emailTo , $subject ,$content ,$headers)){
                $success = '<div role="alert" id="success"><p>Your Message was sent successfully '.
                ' we’ll get back to you ASAP!</p></div>'; 
        }
        else{
            $error = '<div id="error" role="alert"><p>Your message could not be sent please try again later></p></div> ';
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeet’s portfolio website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family:"montserrat";
            color: white;
        }
        html,body{  
            height: 100%;
            width: 100%;
        }
        nav{
            width:100%;
            height:65px;
            background-color: black;
            color: whitesmoke;
            position: fixed;
            display: flex;
            align-items: center;
            z-index: 4;
        }
        nav h1{
            margin-left: 20px;
            font-size: 50px;
        }
        nav h1 span{
            color: rgba(66, 66, 241, 0.948);
        }
        nav a{
            text-decoration: none;
            color: azure;
        }
        nav a:hover{
            text-decoration: underline;
            text-shadow: 2px 2px 12px;
        }
        body{
            background-color: #29465B;
        }
        #mid{
            display: flex;
            justify-content:center;
            position: absolute;
            left:50%;
            transform: translate(-50%);
            gap: 20px;
        }
        #photo{
            width: 100%;
            height: 100vh;
            background-image: url(./background_photo.avif);
            background-size: cover;

        }
        #photo img{
            height: 420px;
            position: absolute;
            border-radius: 50%;
            max-width: 80%;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
        }
        #photo h2{
            position: absolute;
            top: 85%;
            left:50.5%;
            transform: translate(-50%,-50%);        
        }
        #section2{
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #aboutme{
            height: 100%;
            width: 90%;
            background-color: rgb(46, 46, 56);
            padding: 30px;
            display: flex;
            justify-content: space-between;
        }
        #img{
            margin-top: 40px;
            height: 94%;
            width: 24%;
            background-image: url(/1-Html/long_photo.jpg);
            background-position: top;
            background-size: cover;
        }
        #part1{
            padding: 40px;
            max-width: 850px;
        }
        #aboutmetext h3{
            font-size: 32px;
            font-weight: 700;
        }
        #aboutmetext h4{
            font-size: 22px;
        }
        #part1 p{
            font-size: 18px;
        }
        #skillsection{
            height: 40%;
            /* background-color: red; */
            display: flex;
            flex-wrap: wrap;
        }
        .container{
            width: calc(50% - 20px);
            padding: 10px;
            height: 50px;
            line-height: 34px;
            /* background-color: blue; */
        }
        .bar{
            width: 90%;
            height: 20px;
            background-color: #dadada;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            border: 1px solid white;
        }
        #barhtml,#barcss,#barjs,#barphp{
            background-color: rgb(0, 110, 255);
            height: 100%;
            border-radius: 10px;
        }
        #barhtml{
            width: 75%;
        }
        #barcss{
            width: 70%;
        }
        #barjs{
            width: 60%;
        }
        #barphp{
            width: 50%;
        }
        #project{
            text-align: center;
            margin-top: 40px;
        }
        #projects-section{
            height: auto;
            width: 100%;
            display:flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;    
        }
        #project-1 , #project-2 ,#project-3,#project-4{
            height:350px;
            width: 400px;
            background-color: white;
            margin:50px;
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            transition:all ease 0.8s;
        }
        #project-1{
            background-image: url(./squareSpace/Screenshot\ \(24\).png);
            background-size: cover;
            background-position: center;
        }
        #project-2{
            background-image: url(./Sidcup/Screenshot\ \(26\).png);
            background-size: cover;
            background-position: center;
        }
        #project-3{
            background-image: url(./reaction/reactionTest.jpg);
            background-size: cover;
            background-position: left;
        }
        #project-4{
            background-image: url(./bubbleGame/bubbleGame.png);
            background-size: cover;
            background-position: center;
        }
        .textproject {
            background-color:whitesmoke;
            position: absolute;
            bottom: 0%;
            width: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            height: 40px;
            align-items:center;
            justify-content: flex-end;
            border-radius: 10px;
            overflow: hidden; 
            transition: all ease 0.6s;
        } 
        .textproject p{
            font-size: 20px;
            color: black;
        }
        .textproject h2, .textproject h1{
            color: black;
        }
        .textproject a{
            text-decoration: none;
            color: black;
        }  
        .textproject a:hover{
            text-decoration: underline;
            text-shadow: 5px 5px 25px ;
        }
        .textproject:hover{
            height: 180px;
            transition: all ease 0.8s; 
        }
        #project-1:hover , #project-2:hover , #project-3:hover , #project-4:hover{
            width: 800px;
            height: 500px;
            margin:0px 90px;
            transition: ease 1s;    
        }
        hr{
            margin: 40px 0px;
        }
        #contact{
            width: 100%;
            height: auto;
            margin-top: 20px;
            padding: 10px 70px 30px;
            text-align: center;
            font-size: 20px;
        }
        #error , #success {
            transform: translate(2.2%);
            max-width: 1300px;
            height: auto;
            margin-top: 20px;
            padding: 0px 20px;
            border-radius: 20px;
        }
        #error{
              background-color: #CECFD0;
        }
        #error>div>p:first-of-type{
            font-weight: 600;
            
        }
        #error p{
            text-align: left;
            font-size: 20px;
            padding: 5px 0px;
            color: black;
        }
        #success{
            background-color: #5cb85c;
        }
        #contact h1 {
            margin-bottom: 30px;
        }
        form{
           max-width: 1300px;
           display: flex;
           text-align: left;
           margin: 10px auto;
           color: black; 
           margin-top: 40px;
        }
        form label{
            display: block;
            margin-bottom: 10px;
        }
        input{
            color: black;
        }
        #message{
            display: flex;
            flex-direction: column;
            width: 60%;   
        }
        #message textarea{
            border-radius: 7px;
            border: 0px;
            text-align: left;
            padding: 10px;
            color: black;
        }
        #contact-me{
            flex: 1;
            margin-right: 50px;
        }
        #contact-me input{
            width: 100%;
            border-radius: 7px;
            border: 0px;
            padding: 15px 20px ;
            margin-bottom: 20px;
        }
        #message button{
            width: 120px;
            height: 40px;
            color: #5B6BAF;
            border: 0px;
            border-radius: 7px;
            margin-top: 15px;
            text-transform: uppercase;
            font-weight: bold;
            transition: ease  0.5s;
            cursor: pointer;

        }
        #message button:hover{
            box-shadow: 5px 5px 0px black;
            color: black;
            background-color: #D3d7e7;
        }
        footer{
            height: 60px;
            width: 100%;
            background-color: black;
            /* margin-top: 40px; */
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        #copyright{
            margin-left: 20px;
        }
        </style>
</head>
<body>
    <nav>
        <h1><span>J</span>eet</h1>
        <div id="mid">    
            <h3><a href="#about-me">About Me</a></h3>
            <h3><a href="#projects-section">Projects</a></h3>
            <h3><a href="#contact">Contact me</a></h3>
        </div>    
    </nav>
    <div id="photo">
        <img src="./circular.jpg" alt="">
        <h2>Hi I am Jeet and i am studying web development!</h2>

    </div>
    <div id="section2">
        <div id="aboutme">
            <div id="part1">
                <div id="aboutmetext">
                    <h3>About me : </h3>
                    <br>
                    <h4>I am Jeet Tank</h4> <br>
                    <p>I've been Studying Web Development since I was in school and I knew this is what I am meant to do! , 
                        I am working on my career as a full stack web developer and I am very passionate about it , I enjoy 
                        developing various web designs time to time and also focus on my college studies side by side .
                        <br>I am also a sportsperson - I play Karate and Taekwondo , I am self motivated and confident about my works , I can maintain good focus on my goal which lead me to maintain focus for longer period of time.
                        <br>My Parents and My Elder Brother are my inspiration, as they are the reason I am focused and motivated person , they have always taught me to believe in myself and keep working for my goal.
                    </p>
                </div>
                <div id="Skills">
                    <br>
                    <h3>Skills Level: </h3> <br>
                    <p>As I am still in the Learning Phase I have not mastered all of these but day by day I am improving myself! </p>
                    <p>Currently I am working on the backend handling with PHP</p>
                    <div id="skillsection">
                        <div class="container">
                            <h4>HTML5 : </h4>
                            <div class="bar">
                                <div id="barhtml"></div>
                            </div>
                        </div>
                        <div class="container">
                            <h4>CSS : </h4>
                            <div class="bar">
                                <div id="barcss"></div>
                            </div>
                        </div>
                        <div class="container">
                            <h4>JavaScript : </h4>
                            <div class="bar">
                                <div id="barjs"></div>
                            </div>
                        </div>
                        <div class="container">
                            <h4>PHP : </h4>
                            <div class="bar">
                                <div id="barphp"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="img">
            </div>
        </div>
    </div>
    <hr>
    <h1 id="project">Projects</h1>
    <br><br>
    <div id="projects-section">
        <div id="project-1">
            <div class="textproject">
                <p>Project about the website superspace, containing animations</p>
                <br>
                <a href="./squareSpace/squarespace.html"><h2>Visit page</h2></a>
                <br><br>
                <h1>Superspace</h1>
            </div>
        </div>
        <div id="project-2">
            <div class="textproject">
                <p>Project about the website Sidcup Family golf, containing scrolling animations and etc.</p>
                <br>
                <a href="./Sidcup/sidcup.html"><h2>Visit page</h2></a>
                <br><br>
                <h1>Sidcup Family Golf</h1>
            </div>
        </div>
        <div id="project-3">
            <div class="textproject">
                <p>Project about the Reaction Testing Game.</p>
                <br>
                <a href="./reaction/reactiontestgame.html"><h2>Visit page</h2></a>
                <br><br>
                <h1>Reaction Testing Game</h1>
            </div>
        </div>
        <div id="project-4">
            <div class="textproject">
                <p>Project about a bubble game.</p>
                <br>
                <a href="./bubbleGame/bubbleGame.html"><h2>Visit page</h2></a>
                <br><br>
                <h1>Bubble Game</h1>
            </div>
        </div>
    </div>
    <hr>
    <div id="contact">
        <h1>Contact</h1>
        <p>Please contact me using this form, I’d love to hear from you!</p>
        <div id="errors"><?php echo $error.$success ;?></div>
        <form method="post">
        <div id="contact-me">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name ">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="Enter your reason for contact ">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email address ">
        </div>
        <div id="message">
            <label for="content">Message</label>
            <textarea rows="15" name="content" id="content" placeholder="Please enter your message here"></textarea>
            <button type="submit" id="submit">Submit</button>
        </div>
        </form>
    </div>
    <footer>
            <div id="copyright">
                <h3>This is &copy; 2023 Jeet Tank</h3>
            </div>
            <div id="social-media"></div>
            </div>
        </footer>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
    <script src="./jQuery.js"></script>
    <script type="text/javascript">
        $("form").submit(function(e){
            let error = "";
            if($("#name").val() == ""){
                error += `<p>The Name field is required!</p>`;
            }

            if($("#email").val() == ""){
                error += `<p>The Email field is required!</p>`;
            }

            if($("#subject").val() == ""){
                error += `<p>The Subject field is required!</p>`;
            }

            if($("#content").val() == ""){
                error += `<p>The Message field is required!</p>`;
            }
            //testing form for error 

            if(error != ""){
                $("#errors").html(`<div id="error">` + `<p>There were error(s) in your form : </p>`+ error +`</div>`);
            
            return false;
            }
            else{
                return true;
            }
        })

    </script>
</body>
</html>