<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My First Document</title>
</head>
<body>

    <form class="register-form" action="AddQuestion" method="post">

    Question type:
    <select name="qtype">
    	<option>1</option>
    	<option>2</option>
    	<option>3</option>
    </select><br>

    Question:
    <textarea name="question"></textarea><br>

    Answer:
    <textarea name="answer"></textarea><br>

    mcq1:
    <textarea name="mcq1"></textarea><br>

    mcq2:
    <textarea name="mcq2"></textarea><br>

    mcq3:
    <textarea name="mcq3"></textarea><br>

    mcq4:
    <textarea name="mcq4"></textarea><br>

    <input type="submit" name="submit">
    </form>

</body>
</html>