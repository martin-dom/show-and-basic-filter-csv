<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <table>
            <thead>
                <tr>
                <th>First name</th>
                <th>Second name</th>
                <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $x):?>
                    <tr>
                        <td><?php echo $x[0]?></td>
                        <td><?php echo $x[1]?></td>
                        <td><?php echo $x[2]?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="filter">
            <h3>Filter</h3>
            <form action="#" method="post">
                <div class="grupe">
                    <label for="attempt">Write part of second name:</label><br>
                    <input type="text" id="tryFind" name="tryFind" required><br><br>
                </div>
                <input type="submit" value="send">
            </form>
            <h3>New person</h3>
            <form action="#" method="post">
                <div class="grupe">
                    <label for="attempt">Write first name:</label><br>
                    <input type="text" id="add_first_name" name="add_first_name" required><br><br>
                </div>
                <div class="grupe">
                    <label for="attempt">Write second name:</label><br>
                    <input type="text" id="add_second_name" name="add_second_name" required><br><br>
                </div>
                <div class="grupe">
                    <label for="attempt">Write email:</label><br>
                    <input type="text" id="add_email" name="add_email" required><br><br>
                </div>
                <input type="submit" value="send">
            </form>
            <h3>Delete person</h3>
            <form action="#" method="post">
                <div class="grupe">
                    <label for="attempt">Write first name:</label><br>
                    <input type="text" id="del_first_name" name="del_first_name" required><br><br>
                </div>
                <div class="grupe">
                    <label for="attempt">Write second name:</label><br>
                    <input type="text" id="del_second_name" name="del_second_name" required><br><br>
                </div>
                <input type="submit" value="send">
            </form>
        </div>
    </div>
</body>
</html>