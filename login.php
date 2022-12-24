<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <p>Aegis</p>
        </header>
        <div class="form">
            <form method="POST" action="./Logic/login.php">
                <label for="username" >UserName</label>
                <input name="username" type="text" required/>

                <label for="password" >Password</label>
                <input name="password" type="password" required/>
                
                <input type="submit" value="Login" name="submit"/>
            </form>
            <p>Don't have an account ? <a href="./index.php">Sign Up</a> </p>
        </div>
    </body>
</html>