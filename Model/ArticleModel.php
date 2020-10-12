<?php
// CRUD FOR ARTICLE
// -----------------------------------------------------------------------------------------------------------------------

// READ ALL
function getAllArticles()
{
    $pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $querySql = "SELECT * FROM article";
    try {
        $sendRequest = $pdo->query($querySql);
        $articles = $sendRequest->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        return $error;
    }
}

// -----------------------------------------------------------------------------------------------------------------------
// READ ONE
function getOneArticle(int $id)
{
    $pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    try {
        // CODE ICI
        
        return ;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        return $error;
    }
}

// -----------------------------------------------------------------------------------------------------------------------
// CREATE
function createArticle(array $data)
{
    $pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    try {
        // CODE ICI
       
        // After action redirect to index
        header('Location: http://localhost:8000/index.php');
    } catch (PDOException $e) {
        $error = $e->getMessage();
        return $error;
    }
}

// -----------------------------------------------------------------------------------------------------------------------
// UPDATE
function updateArticle(array $data)
{
    $pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    try {
        // CODE ICI
        
        // After action redirect to index
        header('Location: http://localhost:8000/index.php');
    } catch (PDOException $e) {
        $error = $e->getMessage();
        return $error;
    }
}

// -----------------------------------------------------------------------------------------------------------------------
// DELETE
function deleteArticle(int $id)
{
    $pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    try {
        // CODE ICI
        $deleteArticle = $pdo->prepare('DELETE FROM article WHERE id=:id');
        $deleteArticle->execute(['id' => $id]);
        // After action redirect to index
        header('Location: http://localhost:8000/index.php');
    } catch (PDOException $e) {
        $error = $e->getMessage();
        return $error;
    }
}

// BONUS-----------------------------------------------------------------------------------------------------------------
// SEARCH
function search(string $term)
{
    $pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    try {
        // CODE ICI
       
        return ;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        return $error;
    }
}