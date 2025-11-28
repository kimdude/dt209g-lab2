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
        ?>
            <article class="priority<?= $item['priority'] ?>">
                <div class="textContainer">
                    <h3><?= $item['name'] ?></h3>
                    <p><?= $item['description'] ?></p>
                </div>
                <!-- Checkbox sending ID via URL -->
                <a href="bucketlist.php?delete=<?= $item['id'] ?>" class="checkBox"></a>
            </article>
        <?php
    }
}

//Adding new item to bucketlist
if (isset($_POST['item'])) {
    $added = $bucketlist->addItem($_POST['item'],$_POST['description'],$_POST['priority']);

    if($added) {
        header("Location: bucketlist.php?message=Mål tillagt");
        exit();
    } else {
        header("Location: bucketlist.php?message=Ett fel uppstod. Försök igen senare.");
        exit();
    }
}

//Displaying message
if(isset($_GET['message'])) {
    echo "<p class='confirmMessage'>" .$_GET['message'] . "</p>";
}
?>

<!-- Adding item to bucketlist -->
<h2>Lägg till i bucketlistan</h2>
<form method="post" action="bucketlist.php">
    <label for="item">Titel:</label><br>
    <input type="text" id="item" name="item" required><br>
    <labdel for="description">Beskrivning:</label><br>
    <textarea id="description" name="description" required></textarea><br>
    <select name="priority" id="priority">
        <option value="1">Hög</option>
        <option value="2">Medel</option>
        <option value="3">Låg</option>
    </select><br>
    <input type="submit" value="Lägg till">
</form>

<?php
include("includes/footer.php");