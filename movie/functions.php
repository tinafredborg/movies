<?php
/* search function*/
function GetSearchResult($search)
{
    //$search = $_POST['search'];
    $terms = explode(" ", trim($search));
    $i = 0;
    $error = "No ducks home!";
    $query = "SELECT DISTINCT film.id, film.title, film.price, film.photo FROM filmtags JOIN film 
    ON filmtags.filmId = film.id JOIN tags ON filmtags.tagId = tags.id WHERE ";

    foreach ($terms as $each) {
        $i++;
        if ($i == 1) {
            $query .= "tags.tag LIKE '%$each%'";
        } else {
            $query .= " OR tags.Tag LIKE '%$each%'";
        }
    }
    try {
        $conn = Database::connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($data)) {
        echo '<table>';
        $columns = 0;
        $wantedColumns = 2;

        foreach ($data as $film) {

            if ($columns == 0) {
                echo '<tr>';

            $link = "../product/prodetails.php";
            // Fyld et table data field med et produkt.
            echo '<td>';
            echo "<a href=" . $link . "?filmId=" . $film['id'] . "><img src=../product/" . $film['photos'] . "><br></a>";
            echo $film['title'] . "<br>";
            echo $film['price'] . "<br>";
            echo '</td>';
            $columns++;
            if ($wantedColumns == $columns) {
                echo '</tr>';
                $columns = 0;
            }
        }
        echo '</table>';

    }
}
}

/*related product function*/
function getmovie($m_id)
{
    try {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT * FROM film WHERE id = $m_id LIMIT 1");
        $stmt->execute();
    }//ProID, Name, Pris, Photos
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $pro = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($movie)) {
        echo $movie[0]["title"] . "<br>";
        echo "<img src='" . $pro[0]['photo'] . "'><br>";
        echo $movie[0]["content"] . "<br>";
        echo "<br>";
        echo $movie[0]["price"];
        echo "<br><br><br>";

        $tagsQuery = "SELECT DISTINCT tags.tag FROM filmtags
    JOIN tags ON filmtags.tagId = tags.id
    JOIN film ON filmtags.filmId = film.id
    WHERE filmtags.filmId = '$m_id'";
        try {
            $conn = Database::connect();
            $stmt = $conn->prepare("$tagsQuery");
            $stmt->execute();
        }//ProID, Name, Pris, Photos
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        getRelatedProducts($tags);
    } else {
        echo "No movie found, check your internet connection!";
    }
}

function getRelatedmovie($tags)
    {
        $i = 0;
        $query = "SELECT DISTINCT title, photo, price FROM filmtags
    JOIN tags ON filmtags.tagId = tags.id
    JOIN film ON filmtags.filmId = film.id
    WHERE ";
        if (empty($tags)) {
            $query .= "tags.tag LIKE 'Gul' ";
        } else {
            foreach ($tags as $tag) {
                $i++;
                $m_tag = $tag['tag'];
                if ($i == 1) {
                    $query .= "tags.tag LIKE '$m_tag' ";
                } else {
                    $query .= "OR tags.tag LIKE '$m_tag'";
                }
            }
        }
        $query .= " ORDER BY RAND() LIMIT 2";
        try {
            $conn = Database::connect();
            $stmt = $conn->prepare("$query");
            $stmt->execute();
        }//ProID, Name, Pris, Photos
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($films as $film) {
            echo $film["title"] . "<br>";
            echo "<img src='" . $film['photo'] . "'><br>";
            echo $film["price"] . "<br>";
        }

    }

function GenerateProductGrid($movie) {


            echo '<table>';

        $columns = 0;

        $wantedColumns = 2;

        foreach ($movie as $film) {

            if ($columns == 0) {
                echo '<tr>';
            }
            $link = "prodetails.php";

            echo '<td>';
            echo "<a href='" . $link . "?filmId=" . $film['id'] . "'><img src='" . $film['photo'] . "'><br></a>";
            echo $film['title'] . "<br>";
            echo $film['price'] . "<br>";
            echo '</td>';
            $columns++;

            if ($wantedColumns == $columns) {
                echo '</tr>';
                $columns = 0;
            }
        }
        echo '</table>';
}