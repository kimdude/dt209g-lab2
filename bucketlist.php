<?php
$title = "Startsida";
include("includes/header.php");
?>

<h1>Min bucketlist</h1>

<?php
//Reading bucketlist items 
$bucketlist = new Bucketlist();
$totalItems = $bucketlist->getItems();

//Deleting item from bucketlist
if(isset($_GET['delete'])) {
    $bucketlist->deleteItem($_GET['delete']);
    header("Location: bucketlist.php?message=Grattis! Du klarade målet.");
    exit();
}

if(count($totalItems)> 0 ){
    foreach($totalItems as $item) {
        //Formatting date
        $date = date_create($item['created_at']);
        $formattedDate = date_format($date, 'Y-m-d');

        ?>
            <article class="priority<?= $item['priority'] ?>">
                <div class="textContainer">
                    <h3><?= $item['name'] ?></h3>
                    <p><?= $item['description'] ?></p>
                    <p class="displayDate"><small><em>Tillagt <?= $formattedDate?></em></small></p>
                </div>
                <!-- Checkbox sending ID via URL -->
                <a href="bucketlist.php?delete=<?= $item['id'] ?>" class="checkBox"></a>
            </article>
        <?php
    }
}

?>

<!-- Adding item to bucketlist -->
<h2>Lägg till i bucketlistan</h2>

<?php
//Adding new item to bucketlist
if (isset($_POST['item'])) {
    $errorArr = [];

    $newTitle = $bucketlist->setTitle($_POST['item']);
    $newDesc = $bucketlist->setDesc($_POST['description']);

    if(!$newTitle) array_push($errorArr, "Ange titel");
    if(!$newDesc) array_push($errorArr, "Ange beskrivning");

    if(count($errorArr) > 0) {
        ?>
        <ul>
        <?php
        foreach($errorArr as $error) {
            echo "<li>" . $error . "</li>";
        }
        ?>
        </ul>
        <?php
    } else {
        $added = $bucketlist->addItem($_POST['item'],$_POST['description'],$_POST['priority']);

        if($added) {
            header("Location: bucketlist.php?message=Mål tillagt");
            exit();
        } else {
            echo "<p class='confirmMessage'>Ett fel uppstod. Vänligen försök igen.</p>";
        }
    }
}

//Displaying message
if(isset($_GET['message'])) {
    echo "<p class='confirmMessage'>" .$_GET['message'] . "</p>";
}
?>

<!-- Form inputs -->
<form method="post" action="bucketlist.php">
    <label for="item">Titel:</label><br>
    <input type="text" id="item" name="item" value="<?= $bucketlist->getTitle() ?>"><br>
    <label for="description">Beskrivning:</label><br>
    <textarea id="description" name="description"><?= $bucketlist->getDesc() ?></textarea><br>
    <label for="priority">Prioritet:</label><br>
    <select name="priority" id="priority">
        <option value="1">Hög</option>
        <option value="2">Medel</option>
        <option value="3">Låg</option>
    </select><br>
    <input type="submit" value="Lägg till" class="addBtn">
</form>

<?php
include("includes/footer.php");