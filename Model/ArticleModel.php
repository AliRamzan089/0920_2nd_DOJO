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
        $request ="SELECT * FROM article WHERE id=$id";
        $sendRequest = $pdo->query($request);
        $article = $sendRequest->fetchObject();
        return $article;
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
        $pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $insertArticle = $pdo->prepare("INSERT INTO article (title, img, content) VALUES (:title, :img, :content)");
        $insertArticle->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $insertArticle->bindValue(':img', $data['img'], PDO::PARAM_STR);
        $insertArticle->bindValue(':content', $data['content']);
        $insertArticle->execute();
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
        $pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $insertArticle = $pdo->prepare("UPDATE article SET title=:title, img=:img, content=:content WHERE id=:id");
        $insertArticle->bindValue(':id', $data['id'], PDO::PARAM_INT);
        $insertArticle->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $insertArticle->bindValue(':img', $data['img'], PDO::PARAM_STR);
        $insertArticle->bindValue(':content', $data['content']);
        $insertArticle->execute();
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
        $request = $pdo->prepare("SELECT * FROM article WHERE title LIKE :search ORDER BY title ASC");
        $request->bindValue(':search', $term.'%', PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error = $e->getMessage();
        return $error;
    }
}