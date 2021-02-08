<div id="home" style="margin: 0 15px">
    <h2  style="color: #000000">Recruitment</h2>
    <div class="legal">Here is the recruiting page.</div>
    <h4>Jobs</h4>
    <div class="legal">Here is the list of job offers having or being offered by the restaurant.</div>
    <div class="legal">It is possible to close a current offer. The closing date will be recorded and the status will be modified.</div>
    <div class="legal">You can add new job offers with the "+" button below the list.</div>
    <div class="legal"></div>
    <div class="legal"></div>
    <br>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Availability</th>
                <th>Contract</th>
                <th>Hourly wage</th>
                <th>Creation date of the job offer</th>
                <th>Closing date of the job offer</th>
                <th>Postulation</th>
                <th>Close offer</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $controller = new Controller();
                foreach ($controller->selectAllOffer() as $offer) {
                    echo '<tr><td>' . $offer['name'] . '</td>' .
                    '<td>' . $offer['description'] . '</td>' .
                    '<td>' . ($offer['availability'] == 1 ? 'Available' : 'Not available') . '</td>' .
                    '<td>' . $offer['contract'] . '</td>' .
                    '<td>' . $offer['hourly_wage'] . ' € / hour' . '</td>' .
                    '<td>' . substr($offer['start_date'], 8, 2) . '/' . substr($offer['start_date'], 5, 2) . '/' . substr($offer['start_date'], 0, 4) . '</td>' .
                    '<td>' . ($offer['end_date'] == '' ? 'Ongoing' : substr($offer['end_date'], 8, 2) . '/' . substr($offer['end_date'], 5, 2) . '/' . substr($offer['end_date'], 0, 4)) . '</td>' .
                    '<td><a href="controller/postulation.php?id=' . $offer['id'] . '"><img src="img/iconfinder_icon-ios7-arrow-forward_211688.png" style="height: 16px"></a></td>' .
                    '<td>' . ($offer['end_date'] == '' ? '<a href="close.php?id=' . $offer['id'] . '"><img src="img/double-arrow.png" style="height: 16px"></a></td></tr>' : 'Offer closed</td></tr>');
                }
                if (isset($_GET['addOffer'])) {
                    echo '<tr><form action="" method="post"><td><input name="name" placeholder="Name" type="text"></td>' .
                        '<td><input name="description" placeholder="Description" type="text"></td>' .
                        '<td></td><td><input name="contract" placeholder="Contract" type="text"></td>' .
                        '<td><input min="0" name="hourly_wage" placeholder="Hourly wage" step="0.01" type="number"></td>' .
                        '<td></td><td></td><td><a href="index.php"><img src="img/cancel-146131_1280.webp" style="height: 16px"></a></td>' .
                        '<td><input name="addOffer" type="submit" value="" style="background-image: url(\'img/Tick_Mark-512.webp\'); border:none; background-repeat:no-repeat;background-size:100% 100%;"></td>' .
                        '</form></tr>';
                } else {
                    echo "<tr><td colspan='9'><a href='index.php?addOffer'><img src='img/plus-124-459368.webp' style='height: 16px'></a></td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    <div class="legal">Return to the Admin selection panel.</div>
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
        <button class="button-secondary pure-button" onclick="location.href='controller/back.php'">Admin control panel</button>
    </div>
</div>
