<?php
require_once 'config.php';

$id = (int)$_GET['id'];

// 1️⃣ Dohvati proizvod iz baze
$stmt = $baza->prepare("SELECT * FROM shoes WHERE id = :id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch();

if(!$product) {
    echo "<p style='color:red'>❌ Proizvod nije pronađen!</p>";
    exit;
}

// 2️⃣ Ako je forma poslata – ažuriraj proizvod
if(isset($_POST['update_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $originalPrice = $_POST['originalPrice'];
    $gender = $_POST['gender'];
    $sale = isset($_POST['sale']) ? 1 : 0;
    $available = isset($_POST['available']) ? 1 : 0;
    $size = json_encode(array_map('floatval', explode(',', $_POST['size'])));
    $colour = json_encode(array_map('trim', explode(',', $_POST['colour'])));
    $shoeHeight = $_POST['shoeHeight'];
    $collection = $_POST['collection'];
    $sports = $_POST['sports'];
    $brand = $_POST['brand'];
    $releaseYear = $_POST['releaseYear'];
    $rating = $_POST['rating'];
    $popularity = $_POST['popularity'];
    $stock = $_POST['stock'];

    // 📸 upload slike (ako je dodana nova)
    $imgPath = $product['img'];
    if(isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $imgName = basename($_FILES['img']['name']);
        $targetDir = "imgs/shoes/";
        $targetPath = $targetDir . $imgName;
        move_uploaded_file($_FILES['img']['tmp_name'], $targetPath);
        $imgPath = $targetPath;
    }

    // 3️⃣ Ažuriranje baze
    $stmt = $baza->prepare("
        UPDATE shoes SET
            name = :name,
            price = :price,
            originalPrice = :originalPrice,
            img = :img,
            gender = :gender,
            sale = :sale,
            available = :available,
            size = :size,
            colour = :colour,
            shoeHeight = :shoeHeight,
            collection = :collection,
            sports = :sports,
            brand = :brand,
            releaseYear = :releaseYear,
            rating = :rating,
            popularity = :popularity,
            stock = :stock
        WHERE id = :id
    ");

    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':originalPrice' => $originalPrice,
        ':img' => $imgPath,
        ':gender' => $gender,
        ':sale' => $sale,
        ':available' => $available,
        ':size' => $size,
        ':colour' => $colour,
        ':shoeHeight' => $shoeHeight,
        ':collection' => $collection,
        ':sports' => $sports,
        ':brand' => $brand,
        ':releaseYear' => $releaseYear,
        ':rating' => $rating,
        ':popularity' => $popularity,
        ':stock' => $stock,
        ':id' => $id
    ]);

    echo "<p style='color:green'>✅ Proizvod je uspješno ažuriran!</p>";
    header("refresh:2;url=add-shoe.php");
    exit;
}
?>

    <link rel="stylesheet" href="./css/shared.css">
    <link rel="stylesheet" href="./css/addon-edit.css">

    <h2>Uredi proizvod</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" placeholder="Naziv proizvoda" required><br>
        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" placeholder="Cijena" required><br>
        <input type="number" step="0.01" name="originalPrice" value="<?= $product['originalPrice'] ?>" placeholder="Originalna cijena"><br>

        <label for="img-input">Choose image</label><br>
        <input type="file" id="img-input" name="img" accept="image/*"><br>
        <small>Trenutna slika: <?= htmlspecialchars($product['img']) ?></small><br><br>

        <select name="gender">
            <option value="male" <?= $product['gender'] == 'male' ? 'selected' : '' ?>>Muški</option>
            <option value="female" <?= $product['gender'] == 'female' ? 'selected' : '' ?>>Ženski</option>
            <option value="unisex" <?= $product['gender'] == 'unisex' ? 'selected' : '' ?>>Unisex</option>
        </select><br>

        <label><input type="checkbox" name="sale" <?= $product['sale'] ? 'checked' : '' ?>> Sale?</label><br>
        <label><input type="checkbox" name="available" <?= $product['available'] ? 'checked' : '' ?>> Available?</label><br>

        <input type="text" name="size" value="<?= implode(',', json_decode($product['size'], true)) ?>" placeholder="Size (e.g. 37,41,45)"><br>
        <input type="text" name="colour" value="<?= implode(',', json_decode($product['colour'], true)) ?>" placeholder="Colour (e.g. red,green,blue)"><br>
        <input type="text" name="shoeHeight" value="<?= htmlspecialchars($product['shoeHeight']) ?>" placeholder="shoeHeight"><br>
        <input type="text" name="collection" value="<?= htmlspecialchars($product['collection']) ?>" placeholder="collection"><br>
        <input type="text" name="sports" value="<?= htmlspecialchars($product['sports']) ?>" placeholder="sports"><br>
        <input type="text" name="brand" value="<?= htmlspecialchars($product['brand']) ?>" placeholder="brand"><br>
        <input type="number" name="releaseYear" value="<?= $product['releaseYear'] ?>" placeholder="releaseYear"><br>
        <input type="number" step="0.1" name="rating" value="<?= $product['rating'] ?>" placeholder="rating"><br>
        <input type="number" name="popularity" value="<?= $product['popularity'] ?>" placeholder="popularity"><br>
        <input type="number" name="stock" value="<?= $product['stock'] ?>" placeholder="stock"><br>

        <input type="submit" name="update_product" value="Ažuriraj proizvod">
    </form>