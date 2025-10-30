<?php
require_once 'config.php';

// 1. DOHVATI PARAMETRE (ID i TYPE)
$id = isset($_GET['remove']) ? (int)$_GET['remove'] : null;
$product_type = isset($_GET['type']) && in_array($_GET['type'], ['shoes', 'clothes']) 
    ? $_GET['type'] 
    : null;
$table_name = $product_type; // Dinamički naziv tabele

// 2. PROVJERA I BRISANJE
if($id && $table_name) {
    try {
        // Koristi dinamički naziv tabele za brisanje
        $stmt = $baza->prepare("DELETE FROM {$table_name} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        
        // OPCIONALNO: Ovdje biste mogli dodati logiku za brisanje slike sa servera ako je potrebno

    } catch (PDOException $e) {
        // Zapiši grešku ili je prikaži
        die("Greška pri brisanju: " . $e->getMessage());
    }
}

// 3. VRATI SE NAZAD
// Uvijek preusmjeri nazad na glavnu admin stranicu
header("Location: add-product.php");
exit;

?>