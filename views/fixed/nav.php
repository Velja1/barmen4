<!-- Header -->
<header id="header" class="rel">
    <h1><strong><a href="index.php">Barmen</strong> Yachting</h1></a>
    <nav id="nav">
        <ul>
            <?php
                global $conn;
                $upit="SELECT * FROM meni WHERE lokacija = 'header' AND href NOT LIKE 'admin'";
                $podaci=$conn->query($upit)->fetchAll();
                foreach($podaci as $red):
            ?>
                <li><a href="index.php?page=<?=$red->href?>"><?=$red->naziv?></a></li>
            <?php
                endforeach;
                if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->id_uloga==1):
                    global $conn;
                    $upit="SELECT * FROM meni WHERE lokacija = 'header' AND href='admin'";
                    $adminMeni=$conn->query($upit)->fetch();
            ?>
            <li><a href="index.php?page=<?=$adminMeni->href?>"><?=$adminMeni->naziv?></a></li>
        </ul>
        <?php
            endif;
        ?>
    </nav>
</header>
<header id="header2">
    <ul id="meni">
        <li><a href="#"><img id="hamburger" src="images/hamburger.png" alt="Meni"/></a>
            <ul class="active">
            <?php
                global $conn;
                $upit="SELECT * FROM meni WHERE lokacija = 'header' AND href NOT LIKE 'admin'";
                $podaci=$conn->query($upit)->fetchAll();
                foreach($podaci as $red):
            ?>
                <li><a href="index.php?page=<?=$red->href?>"><?=$red->naziv?></a></li>
            <?php
                endforeach;
                if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->id_uloga==1):
                    global $conn;
                    $upit="SELECT * FROM meni WHERE lokacija = 'header' AND href='admin'";
                    $adminMeni=$conn->query($upit)->fetch();
            ?>
            <li><a href="index.php?page=<?=$adminMeni->href?>"><?=$adminMeni->naziv?></a></li>
        </ul>
        <?php
            endif;
        ?>
            </ul>
        </li>
    </ul>
</header>