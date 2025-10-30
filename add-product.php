<?php
require_once 'config.php'; // konekcija $baza

// 1. LOGIKA ZA DODAVANJE PROIZVODA
if (isset($_POST['add_product'])) {
    
    // 1a. Određivanje tabele (shoes ili clothes)
    $product_type = $_POST['productType'];
    $table_name = in_array($product_type, ['shoes', 'clothes']) ? $product_type : null;

    if (!$table_name) {
        echo "<p style='color:red'>Greška: Nevažeći tip proizvoda!</p>";
    } else {
        // 1b. Dohvati podatke iz forme
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

        // 1c. Upload slike (Koristimo 'uploads/' kao standardnu putanju)
        $imgPath = null;
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['img']['tmp_name'];
            $fileName = $_FILES['img']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            // Kreiramo jedinstveno ime za fajl
            $newFileName = uniqid($product_type . '_', true) . '.' . $fileExtension;
            $uploadDir = 'uploads/'; // Standardizovana putanja

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $destPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $imgPath = $destPath; // ovo ide u bazu
            } else {
                echo "<p style='color:red'>Greška pri uploadu slike!</p>";
            }
        }

        // 1d. Prepared statement za unos u DINAMIČKU tabelu
        // Upit sada koristi $table_name varijablu
        $stmt = $baza->prepare("
            INSERT INTO {$table_name} 
            (name, price, originalPrice, img, gender, sale, available, size, colour, shoeHeight, collection, sports, brand, releaseYear, rating, popularity, stock)
            VALUES 
            (:name, :price, :originalPrice, :img, :gender, :sale, :available, :size, :colour, :shoeHeight, :collection, :sports, :brand, :releaseYear, :rating, :popularity, :stock)
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
            ':stock' => $stock
        ]);

        echo "<p style='color:green'>Proizvod je uspješno dodat u tabelu '{$table_name}'!</p>";
    }
}

// 2. LOGIKA ZA PRIKAZ SVIH PROIZVODA (IZ OBJE TABELE)
// Koristimo UNION da spojimo rezultate iz 'shoes' i 'clothes'
// Dodajemo 'type' kolonu da znamo koji je koji
try {
    $sql = "
        (SELECT *, 'shoes' as product_type FROM shoes)
        UNION
        (SELECT *, 'clothes' as product_type FROM clothes)
        ORDER BY created_at DESC
    ";
    $products = $baza->query($sql)->fetchAll();
} catch (PDOException $e) {
    // Greška se može desiti ako tabela 'clothes' ne postoji
    echo "<p style='color:red'>Greška pri dohvatanju proizvoda. Provjerite da li tabela 'clothes' postoji i ima istu strukturu kao 'shoes'.</p>";
    $products = []; // Prazan niz da se ostatak stranice učita
}
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Dodavanje proizvoda</title>
    <link rel="stylesheet" href="./css/shared.css">
    <link rel="stylesheet" href="./css/addon.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="center-div">
        <h1>Dodaj novi proizvod</h1>
        <form action="add-product.php" method="post" enctype="multipart/form-data">
            
            <select name="productType" required>
                <option value="" disabled selected>--- Izaberi tip proizvoda ---</option>
                <option value="shoes">Patika (Tabela: shoes)</option>
                <option value="clothes">Odjeća (Tabela: clothes)</option>
            </select><br>

            <input type="text" name="name" placeholder="Naziv proizvoda" required><br>
            <input type="number" step="0.01" name="price" placeholder="Cijena" required><br>
            <input type="number" step="0.01" name="originalPrice" placeholder="Originalna cijena"><br>
            
            <label for="img-input">Choose image</label>
            <input type="file" id="img-input" name="img" accept="image/*" ><br>

            <select name="gender">
                <option value="male">Muški</option>
                <option value="female">Ženski</option>
                <option value="unisex">Unisex</option>
            </select><br>
            <label for="sale">Sale?</label>
            <input type="checkbox" id="sale" name="sale"><br>
            <label for="available">Available?</label>
            <input type="checkbox" name="available" id="available" checked><br>
            <input type="text" name="size" placeholder="Size (e.g. 37,41,45)"><br>
            <input type="text" name="colour" placeholder="Colour (e.g. red,green,blue)"><br>
            
            <input type="text" name="shoeHeight" placeholder="shoeHeight (ili N/A za odjeću)"><br> 
            
            <input type="text" name="collection" placeholder="collection"><br>
            <input type="text" name="sports" placeholder="sports"><br>
            <input type="text" name="brand" placeholder="brand"><br>
            <input type="number" name="releaseYear" placeholder="releaseYear"><br>
            <input type="number" step="0.1" name="rating" placeholder="rating"><br>
            <input type="number" name="popularity" placeholder="popularity"><br>
            <input type="number" name="stock" placeholder="stock"><br>
            <input type="submit" name="add_product" value="Dodaj proizvod">
        </form>

        <hr style="margin: 30px 0;">
        <h2>Svi proizvodi (Patike i Odjeća)</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th> <th>Price</th>
                    <th>Gender</th>
                    <th>Stock</th>
                    <th colspan="2">Advanced</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><strong><?= htmlspecialchars(strtoupper($product['product_type'])) ?></strong></td> 
                        <td><?= htmlspecialchars($product['price']) ?></td>
                        <td><?= htmlspecialchars($product['gender']) ?></td>
                        <td><?= htmlspecialchars($product['stock']) ?></td>
                        <td>
                            <a href="remove.php?remove=<?= $product['id'] ?>&type=<?= $product['product_type'] ?>" onclick="return confirm('Sigurno želite obrisati?');">
                                <img src="imgs/icons/close_btn.svg" width="25" alt="Remove">
                            </a>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $product['id'] ?>&type=<?= $product['product_type'] ?>">
                                <img src="imgs/icons/edit.svg" width="25" alt="Edit">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>