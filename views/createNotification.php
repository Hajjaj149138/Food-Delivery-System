
<?php
session_start();
if(isset($_COOKIE['flag'])){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Notifications</title>
    <link rel="stylesheet" href="createNotification.css">
    <script>
        function validateForm() {
            const title = document.createNotificationForm.title;
            const description = document.createNotificationForm.description;

            if (title.value.trim() === "") {
                alert("Title must be filled out");
                title.focus();
                return false;
            }

            if (description.value.trim() === "") {
                alert("Description must be filled out");
                description.focus();
                return false;
            }

            return true;
        }
        
        function ajax() {
            const title = document.createNotificationForm.title.value;
            const description = document.createNotificationForm.description.value;

            let data = {
                'title': title,
                'description': description
            };

            let info = JSON.stringify(data);

            let xhttp = new XMLHttpRequest();

            xhttp.open('post', 'server.php', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send('data=' + info);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let info = JSON.parse(this.responseText);
                    document.getElementsByTagName('h2')[0].innerHTML = "Title: " + info.title;
                    document.getElementsByTagName('h2')[1].innerHTML = "<br><br><br>Description: " + info.description;
                }
            }
        }

        <?php
}
else{
header('location: login.php');
}
?>

    </script>
</head>
<body>
    <fieldset>
        <legend>
            <h1>Create Notification</h1>
            <div class="dashboard">
                <a href="admindashboard.php">Dashboard</a>
            </div>
        </legend>
        <form name="createNotificationForm" method="post" action="../controllers/createNotificationHandler.php" onsubmit="return validateForm()">
            <label><b>Title:</b></label>
            <br>
            <input type="text" name="title">
            <br>
            <label><b>Description:</b></label>
            <br>
            <input type="text" name="description">
            <br><br>
            <input type="button" name="click" value="Check" onclick="ajax()">
            <input type="submit" value="Create">
        </form>
    </fieldset>
    <h2></h2>
    <h2></h2>
</body>
</html>




