<template>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>

    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Link File CSS -->
</head>
<body>
    <header>
        <nav>
            <div class="menu">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Features</a>
                <a href="#">Variations</a>
                <a href="#">Specials</a>
                <a href="#">Contact</a>
            </div>

            <div class="social">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </nav>
    </header>
    
    <div class="hero">

        <div class="text">
            <h4>Powerful, Fun and</h4>
            <h1>Fierce to <br> <span>Drive</span></h1>
            <p>Real Poise, Real Power, Real Perfomance.</p>
            <a href="#" class="btn">book a test ride</a>
        </div>
    </div>

  
</body>

</template>

<style scoped>

/* font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}
header{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
}
header nav{
    width: 90%;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 80px;
}
header nav .logo{
    width: 150px;
}
header nav .menu{
    display: flex;
    align-items: center;
}
nav .menu a{
    color: #fff;
    margin-left: 30px;
    position: relative;
}
nav .menu a::after{
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0%;
    height: 2px;
    background-color: #dd0707;
    transition: 0.4s;
}
nav .menu a:hover::after{
    width: 100%;
}
nav .social a i{
    color: #fff;
    font-size: 22px;
    margin-left: 10px;
    transition: 0.3s;
}
nav .social a i:hover{
    transform: scale(1.3);
    color: #dd0707;
}




.hero{
    width: 100%;
    height: 100vh;
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
.hero .text{
    width: 90%;
    margin: auto;
}
.hero .text h4{
    font-size: 40px;
    color: #fff;
    font-weight: 500;
    margin-bottom: 10px;
}
.hero .text h1{
    color: #fff;
    font-size: 65px;
    text-transform: uppercase;
    line-height: 1;
    margin-bottom: 30px;
}
.hero .text h1 span{
    color: #dd0707;
    font-size: 80px;
    font-weight: bold;
}
.hero .text p{
    color: #fff;
    margin-bottom: 30px;
}
.hero .text .btn{
    padding: 10px 30px;
    background-color: #dd0707;
    text-transform: uppercase;
    color: #fff;
    font-weight: bold;
    border-radius: 30px;
    border: 2px solid #dd0707;
    transition: 0.3s;
}
.hero .text .btn:hover{
    background-color: transparent;
}

</style>