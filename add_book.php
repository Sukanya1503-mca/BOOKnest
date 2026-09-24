<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Book | Admin</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#667eea,#764ba2);
}
.form-box{
    background:#fff;
    width:380px;
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.25);
    animation:fade 0.6s ease;
}
@keyframes fade{
    from{opacity:0; transform:translateY(30px);}
    to{opacity:1; transform:translateY(0);}
}
.form-box h2{text-align:center;margin-bottom:25px;color:#333;}
.input-box{margin-bottom:15px;}
input,select{
    width:100%;
    padding:12px 15px;
    border-radius:25px;
    border:1px solid #ccc;
    outline:none;
    font-size:15px;
}
input:focus,select:focus{
    box-shadow:0 0 8px #667eea;
    border-color:#667eea;
}
.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:25px;
    background:#667eea;
    color:#fff;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
}
.btn:hover{
    background:#764ba2;
    transform:translateY(-3px);
}
.back{
    display:block;
    margin-top:15px;
    text-align:center;
    text-decoration:none;
    color:#667eea;
    font-size:14px;
}
</style>
</head>

<body>

<div class="form-box">
    <h2>➕ Add New Book</h2>

    <form method="post">
        <div class="input-box">
            <input type="text" name="title" placeholder="Book Title" required>
        </div>

        <div class="input-box">
            <select name="category" required>
                <option value="tech">Technology</option>
                <option value="love">Love Stories</option>
                <option value="history">Historical</option>
                <option value="horror">Horror</option>
                <option value="motivation">Motivational</option>
                <option value="real">Real Life</option>
                <option value="scifi">Sci-Fi</option>
                <option value="self">Self Development</option>
            </select>
        </div>

        <div class="input-box">
            <input type="number" name="price" placeholder="Price (₹199)" required>
        </div>

        <div class="input-box">
            <input type="text" name="image" placeholder="Image path (images/book.png)" required>
        </div>

        <div class="input-box">
            <input type="text" name="pdf" placeholder="PDF path (pdfs/book.pdf)" required>
        </div>

        <button class="btn" name="add">Add Book</button>
    </form>

    <a href="admin.php" class="back">← Back to Dashboard</a>
</div>

<?php
if(isset($_POST['add'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $pdf = $_POST['pdf'];

    mysqli_query($conn, "INSERT INTO books(title,category,price,image,pdf,status)
    VALUES('$title','$category','$price','$image','$pdf','available')");

    header("Location: admin.php");
}
?>

</body>
</html>
