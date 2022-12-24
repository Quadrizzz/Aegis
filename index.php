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
            <form method="POST" action="./Logic/signup.php">
                <label for="name" >Full Name</label>
                <input name="name" type="text" required/>

                <label for="username" >UserName</label>
                <input name="username" type="text" required/>

                <label for="email" >Email</label>
                <input name="email" type="email" required/>

                <label for="password" >Password</label>
                <input name="password" type="text" required/>

                <label for="designation">What's your designation ?</label>
                <select name="designation" required>
                    <option>Doctor</option>
                    <option>Service Worker</option>
                </select>

                <input type="submit" value="Create Account" name="submit"/>
            </form>
            <p>Already have an account ? <a href="./login.php">Login</a> </p>
        </div>
    </body>
</html>