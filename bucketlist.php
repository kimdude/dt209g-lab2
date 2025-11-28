<?php
$title = "Startsida";
include("includes/header.php");
?>

<h1>Min bucketlist</h1>

<?php
//Reading bucketlist items 
$bucketlist = new Bucketlist();
$totalItems = $bucketlist->getItems();

if(count($totalItems)> 0 ){
    foreach($totalItems as $item) {
        ?>
            <article class="priority<?= $item['priority'] ?>">
                <h3><?= $item['name'] ?></h3>
                <p><?= $item['description'] ?></p>
                <button class="checkBox"></button>
            </article>
        <?php
    }
}

if (isset($_POST['item'])) {
    $bucketlist->addItem($_POST['item'],$_POST['description'],$_POST['priority']);
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