<style>
    body{
        padding-top: 50px;
    }
    .navbar-default{
        background-color: #0C203F;
        /*color: #eee;*/
    }
    .navbar-header>a.navbar-brand, .nav.navbar-nav.navbar-right>li>a{
        /*background-color: #337ab7;*/
        color: #fff;
    }
    .navbar>.container-fluid{
        padding-left: 20px;
        padding-right: 20px;
    }
    .navbar-header>a.navbar-brand:hover{
        color: #fff;
    }
    .navbar-header>a.navbar-brand>img{
        width: 25px;
        display: inline-block;
    }
    .navbar-header{
        padding-bottom: 6px;
    }
</style>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><img src="/img/contents/ceo.jpg" alt="" class="img-responsive img-circle"> CEO 2017</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['user'])): ?>
            <li><a href="#">Username</a></li>
            <li><a href="/logout">Logout</a></li>
            <?php else: ?>
            <!--<li><a href="/registrasi">Registrasi</a></li>-->
            <!--<li><a href="/login">Login</a></li>-->
            <?php endif;?>
        </ul>
    </div>
</nav>
