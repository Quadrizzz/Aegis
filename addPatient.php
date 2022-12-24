<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="./Logic/addPat.php" method="POST" class="userform">
            <label for="name" >Full Name</label>
            <input name="name" type="text" required/>

            <label for="diagnosis" >Diagnosis</label>
            <textarea rows = "5" cols = "60" name = "diagnosis" required>
                Enter details here...
            </textarea>

            <label for="prescription" >Prescription</label>
            <textarea rows = "5" cols = "60" name = "prescription" required>
                Enter details here...
            </textarea>

            <label for="history" >History</label>
            <textarea rows = "5" cols = "60" name = "history" required>
                Enter details here...
            </textarea>

            <input name="submit" type="submit" value="Add Patient"/>
        </form>
    </body>
</html>