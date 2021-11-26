<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="flashcard.png" />
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

<form method="POST" action="php/process.php" style="align:center;">
    <table>
    <tr>
        <th>Company</th>
        <th>Position</th>
        <th>Status</th>
        <th>Date</th>
        <th></th>
    </tr>
    <tr>
        <td><input type="text" name="companyname" /></td>
        <td><input type="text" name="position" /></td>
        <td>
            <select name="status" id="cars">
                <option value="applied">applied</option>
                <option value="review">review</option>
                <option value="interview">interview</option>
                <option value="pass">pass</option>
                <option value="fail">fail</option>
                <option value="widthdraw">widthdraw</option>
            </select>
        </td>
        <td><input type="date" name="date" /></td>
        <td><button type="submit" name="add-card">Add</button></td>
    </tr>
    </table>
</form>

<div class="cards">
    <?php
    include 'php/process.php';


    if($countCardManuallyAdded){
        while($rowCardManuallyAdded = mysqli_fetch_assoc($resultCardManuallyAdded)){



            echo "<div class='card'>";
            echo "<img class='card__image' src='https://fakeimg.pl/400x300/009578/fff/'>";
            echo "<div class='card__content'>";
            echo "<p>";
            echo "<table>";
            echo "    <tr>";
            echo "       <th style='width:30%;'>Company   </th>";
            echo "       <th style='text-align:left;'>".$rowCardManuallyAdded['companyname']."</th>";
            echo "   </tr>";
            echo "   <tr>";
            echo "        <td> Position</td>";
            echo "       <td style='width:60%,text-align:left;'>".$rowCardManuallyAdded['position']."</td>";
            echo "   </tr>";
            echo "   <tr>";
            echo "       <td> Status</td>";
            echo "       <td style='width:60%,text-align:left;'>".$rowCardManuallyAdded['status']."</td>";
            echo "   </tr>";
            echo "   <tr>";
            echo "       <td> Date</td>";
            echo "       <td style='width:60%,text-align:left;'>".$rowCardManuallyAdded['date']."</td>";
            echo "    </tr>";
            echo "</table>";
            echo "</div>";
            echo "<div class='card__info'>";
            echo "<button type='submit'>Edit</button>";
            echo "</div>";
            echo "</div>";
        }
        mysqli_free_result($resultCardManuallyAdded);
    }  
    ?>
</div>

</body>
</html>