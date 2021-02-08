<div id="home" style="margin: 0 15px">
    <h2  style="color: #000000">Postulation</h2>
    <div class="legal">Here is the list of applications for the position.</div>
    <div class="legal">For postulation "Being processed" it is possible to set a date for a job interview or to refuse the application directly.</div>
    <div class="legal">For postulations "Waiting for interview" whose date is fixed, it is possible to accept or reject the application.</div>
    <div class="legal">For postulation "Accepted" or "Archived" no further action is possible.</div>
    <br>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>Last name</th>
                <th>First name</th>
                <th>Email</th>
                <th>Date of birth</th>
                <th>Country</th>
                <th>City</th>
                <th>Zip code</th>
                <th>CV</th>
                <th>Cover letter</th>
                <th>State</th>
                <th>Date of job interview</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $controller = new Controller();
            foreach ($controller->selectWherePostulation(isset($_GET['id'])) as $postulation) {
                echo '<tr><td>' . $postulation['last_name'] . '</td>' .
                    '<td>' . $postulation['first_name'] . '</td>' .
                    '<td>' . $postulation['email'] . '</td>' .
                    '<td>' . substr($postulation['date_of_birth'], 8, 2) . '/' . substr($postulation['date_of_birth'], 5, 2) . '/' . substr($postulation['date_of_birth'], 0, 4) . '</td>' .
                    '<td>' . $postulation['country'] . '</td>' .
                    '<td>' . $postulation['city'] . '</td>' .
                    '<td>' . $postulation['zip_code'] . '</td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td>' . $postulation['state'] . '</td>' .
                    '<td>' . (($postulation['state'] == 'Being processed') ? '<form style="display: flex; align-items: center" action="" method="post"><input name="idr" type="text" hidden value="' . $_GET['id'] . '"><input name="id" type="text" hidden value="' . $postulation['id'] . '"><input name="date" type="date">&nbsp;<input name="addInterview" type="submit" value="" style="background-image: url(\'img/Tick_Mark-512.webp\'); border:none; background-repeat:no-repeat;background-size:100% 100%;"></form>' : substr($postulation['date_of_job_interview'], 8, 2) . substr($postulation['date_of_job_interview'], 4, 1) . substr($postulation['date_of_job_interview'], 5, 2) . substr($postulation['date_of_job_interview'], 4, 1) . substr($postulation['date_of_job_interview'], 0, 4)) . '</td>' .
                    '<td>' . (($postulation['state'] == 'Waiting for interview') ? '<a href="index.php?no&id=' . $_GET['id'] . '"><img src="img/cancel-146131_1280.webp" style="height: 16px"></a>&nbsp;&nbsp;&nbsp;<a href="index.php?yes&id=' . $_GET['id'] . '"><img src="img/Tick_Mark-512.webp" style="height: 16px"></a>' : (($postulation['state'] == 'Being processed') ? '<a href="index.php?no&id=' . $_GET['id'] . '"><img src="img/cancel-146131_1280.webp" style="height: 16px"></a>' : '')) . '</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="legal">Return to the Recruitment selection panel.</div>
    <br>
    <div>
        <style scoped="">
            .button-secondary {
                color: white;
                border-radius: 4px;
                text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            }
            .button-secondary {
                background: rgb(66, 184, 221);
            }
        </style>
        <button class="button-secondary pure-button" onclick="location.href='controller/recruitment.php'">Recruitment control panel</button>
    </div>
</div>
