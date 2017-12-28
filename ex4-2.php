<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ex4-2</title>
  </head>
  <body>
    <form action="" method="get">
      <fieldset>
        <legend>Date and Time</legend>
        <br>
        <input type="date" name="dob" value="">
        <br>
        <input type="submit" name="submit" value="Submit">
        <br>
      </fieldset>
    </form>
    <br>
    <?php
      // timezone set
      date_default_timezone_set("Asia/Bangkok");
      // function to change month to Laos language
      function DateLao($strDate) {
        $strYear = date("Y", strtotime($strDate));
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("d", strtotime($strDate));

        $strMonthCut = array("", "ມັງກອນ", "ກຸມພາ", "ມີນາ", "ເມສາ", "ພຶດສະພາ", "ມິຖຸນາ", "ກໍລະກົດ", "ສິງຫາ", "ກັນຍາ", "ຕຸລາ", "ພະຈິກ", "ທັນວາ");

        return "$strDay $strMonthCut[$strMonth] $strYear";
      }

      if (isset($_GET['submit'])) {
        echo "Date of Birth is: ".DateLao($_GET['dob']);

        // tody date time
        $today = date("Y-m-d");
        // time differect between now and dob
        $diffTime = date_diff(date_create($_GET['dob']), date_create($today));
        $age = $diffTime->format("%y");
        echo "<br>Age: ".$age;

      }

    ?>
  </body>
</html>
